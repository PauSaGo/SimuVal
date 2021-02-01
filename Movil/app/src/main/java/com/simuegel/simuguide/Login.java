package com.simuegel.simuguide;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.simuegel.simuguide.Academico.Dashboard_Academico;
import com.simuegel.simuguide.Cliente.Cliente_Fragments.Menu_historial;
import com.simuegel.simuguide.Cliente.Dashboard_Cliente;
import com.simuegel.simuguide.Docente.Dashboard_Docente;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class Login extends AppCompatActivity {
    //private static String URL_LOGIN = "http://192.168.1.70/db/login.php";
    private static String URL_LOGIN = "https://pruebasrecompensas.app1.mx/db/login.php";
    private long tiempoboton;

    //ID de los button dependiendo del usuario (Academico, Docente y Alumno)
    private static final String ID_PREFERENCES_ACADEMICO = "simuegel.simuguide.academico", ID_PREFERENCES_DOCENTE = "simuegel.simuguide.docente", ID_PREFERENCES_ALUMNO = "simuegel.simuguide.alumno";

    //Estados de los button de cada usuario
    private static String ESTADO_BUTTON_ACADEMICO = "estado.button.academico", ESTADO_BUTTON_DOCENTE = "estado.button.docente", ESTADO_BUTTON_ALUMNO = "estado.button.alumno";

    EditText no_cuenta,pass;
    TextView regis;
    Button log;
    RadioButton mantener;
    Boolean estadoRadioButon;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.experiment);

        //Verificamos el estado del boton
        if(obtenerEstadoAcademico()) {
            Intent intent = new Intent(Login.this, Dashboard_Academico.class);
            SharedPreferences preferences = getSharedPreferences(ID_PREFERENCES_ACADEMICO,MODE_PRIVATE);
            String cuenta = preferences.getString("no_cuenta_academico","No hay cuenta");
            intent.putExtra("no_cuenta_academico",cuenta);
            startActivity(intent);
            finish();
        }
        if(obtenerEstadoDocente()){
            Intent intent = new Intent(Login.this, Dashboard_Docente.class);
            SharedPreferences preferences = getSharedPreferences(ID_PREFERENCES_DOCENTE,MODE_PRIVATE);
            String cuenta = preferences.getString("no_cuenta_docente","No hay cuenta");
            intent.putExtra("no_cuenta_docente",cuenta);
            startActivity(intent);
            finish();
        }
        if(obtenerEstadoAlumno()){
            Intent intent = new Intent(Login.this, Dashboard_Cliente.class);
            SharedPreferences preferences = getSharedPreferences(ID_PREFERENCES_ALUMNO,MODE_PRIVATE);
            String cuenta = preferences.getString("no_cuenta_alumno","No hay cuenta");
            intent.putExtra("no_cuenta_alumno",cuenta);
            startActivity(intent);
            finish();
        }

        no_cuenta = (EditText)findViewById(R.id.cuenta);
        pass = (EditText)findViewById(R.id.password);
        log = (Button)findViewById(R.id.iniciar);
        regis = (TextView)findViewById(R.id.registrar);
        mantener = (RadioButton)findViewById(R.id.mantener);

        estadoRadioButon = mantener.isChecked(); //inicia desactivado

        log.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String cuenta = no_cuenta.getText().toString().trim();
                String password = pass.getText().toString().trim();

                //LogIn(cuenta, password);

                if(isNetDisponible() == true && isOnlineNet() == true){
                    LogIn(cuenta, password);
                }else{
                    Toast ToastMessage = Toast.makeText(Login.this,"No cuentas con acceso a Internet",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }
            }
        });

        regis.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(Login.this, Registro1.class);
                startActivity(i);
            }
        });

        mantener.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(estadoRadioButon){
                    mantener.setChecked(false);
                }
                estadoRadioButon = mantener.isChecked();
            }
        });
    }

    private boolean isNetDisponible() {

        ConnectivityManager connectivityManager = (ConnectivityManager)
                getSystemService(Context.CONNECTIVITY_SERVICE);

        NetworkInfo actNetInfo = connectivityManager.getActiveNetworkInfo();

        return (actNetInfo != null && actNetInfo.isConnected());
    }

    public Boolean isOnlineNet() {

        try {
            Process p = java.lang.Runtime.getRuntime().exec("ping -c 1 www.google.com");

            int val           = p.waitFor();
            boolean reachable = (val == 0);
            return reachable;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return false;
    }

    private void LogIn(final String cuenta,final String password) {
        if(!cuenta.isEmpty() && !password.isEmpty()){
            StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_LOGIN, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    try {
                        JSONObject jsonObject = new JSONObject(response);
                        String success = jsonObject.getString("success");

                        //Validación si es Academico
                        if (success.equals("3")) {
                            Intent intent = new Intent(Login.this, Dashboard_Academico.class);
                            intent.putExtra("no_cuenta_academic",cuenta);
                            guardarEstadoAdademico();
                            startActivity(intent);
                            finish();
                        }
                        //Validación si es Docente
                        else if (success.equals("2")) {
                            Intent intent = new Intent(Login.this, Dashboard_Docente.class);
                            intent.putExtra("no_cuenta_docent",cuenta);
                            guardarEstadoDocente();
                            startActivity(intent);
                            finish();
                        }
                        //Validación si es Alumno
                        else if (success.equals("1")) {
                            Intent intent = new Intent(Login.this, Dashboard_Cliente.class);
                            intent.putExtra("no_cuenta_alumn",cuenta);
                            guardarEstadoAlumno();
                            startActivity(intent);
                            finish();
                        } else {
                            Toast.makeText(Login.this, "No estás registrado en la base de datos", Toast.LENGTH_SHORT).show();
                        }
                    } catch (JSONException e) {
                        e.printStackTrace();
                        Toast.makeText(Login.this, "Por favor revise los campos", Toast.LENGTH_SHORT).show();
                    }
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(Login.this,"Error volley"+error.toString(),Toast.LENGTH_SHORT).show();
                }
            }){
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String,String>params = new HashMap<>();
                    params.put("no_cuenta",cuenta);
                    params.put("password",password);
                    return params;
                }
            };
            RequestQueue requestQueue = Volley.newRequestQueue(this);
            requestQueue.add(stringRequest);
        }else{
            Toast ToastMessage = Toast.makeText(Login.this,"Por favor revise los campos",Toast.LENGTH_SHORT);
            View toastView = ToastMessage.getView();
            toastView.setBackgroundResource(R.drawable.redondearbordes);
            toastView.setPadding(20,20,20,20);
            ToastMessage.show();
        }
    }//Aquí se acaba el método LogIn

    //Configuracion del Academico
    private void guardarEstadoAdademico() {
        SharedPreferences preferences = getSharedPreferences(ID_PREFERENCES_ACADEMICO,MODE_PRIVATE);
        preferences.edit().putBoolean(ESTADO_BUTTON_ACADEMICO,mantener.isChecked()).apply();
        preferences.edit().putString("no_cuenta_academico",no_cuenta.getText().toString()).apply();
    }

    public boolean obtenerEstadoAcademico() {
        SharedPreferences preferences = getSharedPreferences(ID_PREFERENCES_ACADEMICO,MODE_PRIVATE);
        return preferences.getBoolean(ESTADO_BUTTON_ACADEMICO,false);
    }

    //Metodo para cerrar sesion
    public static void cerrarSesionAcademico(Context c, boolean estado) {
        SharedPreferences preferences = c.getSharedPreferences(ID_PREFERENCES_ACADEMICO,MODE_PRIVATE);
        preferences.edit().putBoolean(ESTADO_BUTTON_ACADEMICO,estado).apply();

    }
    //Fin del academico

    //Configuración del Docente
    private void guardarEstadoDocente() {
        SharedPreferences preferences = getSharedPreferences(ID_PREFERENCES_DOCENTE,MODE_PRIVATE);
        preferences.edit().putBoolean(ESTADO_BUTTON_DOCENTE,mantener.isChecked()).apply();
        preferences.edit().putString("no_cuenta_docente",no_cuenta.getText().toString()).apply();
    }

    public boolean obtenerEstadoDocente() {
        SharedPreferences preferences = getSharedPreferences(ID_PREFERENCES_DOCENTE,MODE_PRIVATE);
        return preferences.getBoolean(ESTADO_BUTTON_DOCENTE,false);
    }

    //Metodo para cerrar sesion
    public static void cerrarSesionDocente(Context c, boolean estado) {
        SharedPreferences preferences = c.getSharedPreferences(ID_PREFERENCES_DOCENTE,MODE_PRIVATE);
        preferences.edit().putBoolean(ESTADO_BUTTON_DOCENTE,estado).apply();

    }
    //Fin del Docente

    //Configuracion del Alumno
    private void guardarEstadoAlumno() {
        SharedPreferences preferences = getSharedPreferences(ID_PREFERENCES_ALUMNO,MODE_PRIVATE);
        preferences.edit().putBoolean(ESTADO_BUTTON_ALUMNO,mantener.isChecked()).apply();
        preferences.edit().putString("no_cuenta_alumno",no_cuenta.getText().toString()).apply();
    }

    public boolean obtenerEstadoAlumno() {
        SharedPreferences preferences = getSharedPreferences(ID_PREFERENCES_ALUMNO,MODE_PRIVATE);
        return preferences.getBoolean(ESTADO_BUTTON_ALUMNO,false);
    }

    //Metodo para cerrar sesion
    public static void cerrarSesionAlumno(Context c, boolean estado) {
        SharedPreferences preferences = c.getSharedPreferences(ID_PREFERENCES_ALUMNO,MODE_PRIVATE);
        preferences.edit().putBoolean(ESTADO_BUTTON_ALUMNO,estado).apply();

    }
    //Fin del Alumno


    @Override
    public void onBackPressed() {

        if(tiempoboton + 2000 > System.currentTimeMillis()){
            //super.onBackPressed();
            finish();
        }else{
            Toast.makeText(Login.this,"Por favor presione otra vez para salir",Toast.LENGTH_SHORT).show();
        }

        tiempoboton = System.currentTimeMillis();
    }
}
