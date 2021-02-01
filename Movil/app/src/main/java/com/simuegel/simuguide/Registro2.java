package com.simuegel.simuguide;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class Registro2 extends AppCompatActivity implements AdapterView.OnItemSelectedListener {
    //private static String URL_REGISTRO = "http://192.168.1.64/db/Registro.php";
    private static String URL_REGISTRO ="https://pruebasrecompensas.app1.mx/db/Registro.php";
    private static  int animacion = 3000;//equivale a 3 segundos
    EditText cuenta, correo, contra, contra2;
    Spinner facultad, carrera, semestre;
    Button registro;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.regis2);

        cuenta = (EditText)findViewById(R.id.cuenta);
        correo = (EditText)findViewById(R.id.correo);
        contra = (EditText)findViewById(R.id.contraseña);
        contra2 = (EditText)findViewById(R.id.contraseña2);
        facultad = (Spinner)findViewById(R.id.facultad);
        carrera = (Spinner)findViewById(R.id.carrera);
        semestre = (Spinner)findViewById(R.id.semestre);
        registro = (Button)findViewById(R.id.registrar);

        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,R.array.facultades,R.layout.support_simple_spinner_dropdown_item);
        adapter.setDropDownViewResource(R.layout.support_simple_spinner_dropdown_item);
        facultad.setAdapter(adapter);
        facultad.setOnItemSelectedListener(this);

        ArrayAdapter<CharSequence> arrayadapter1 = ArrayAdapter.createFromResource(this,R.array.carreras,R.layout.support_simple_spinner_dropdown_item);
        arrayadapter1.setDropDownViewResource(R.layout.support_simple_spinner_dropdown_item);
        carrera.setAdapter(arrayadapter1);
        carrera.setOnItemSelectedListener(this);

        ArrayAdapter<CharSequence> arrayadapter2 = ArrayAdapter.createFromResource(this,R.array.semestres,R.layout.support_simple_spinner_dropdown_item);
        arrayadapter1.setDropDownViewResource(R.layout.support_simple_spinner_dropdown_item);
        semestre.setAdapter(arrayadapter2);
        semestre.setOnItemSelectedListener(this);

        registro.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String contraseña = contra.getText().toString().trim();
                String contraseña2 = contra2.getText().toString().trim();

                if(!contraseña.equals(contraseña2)){
                    Toast ToastMessage = Toast.makeText(Registro2.this,"Las contraseñas no coinciden, Por favor revise los datos",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }else{
                    if(isNetDisponible() == true && isOnlineNet() == true){
                        registro();
                    }else{
                        Toast ToastMessage = Toast.makeText(Registro2.this,"No cuentas con acceso a Internet",Toast.LENGTH_SHORT);
                        View toastView = ToastMessage.getView();
                        toastView.setBackgroundResource(R.drawable.redondearbordes);
                        toastView.setPadding(20,20,20,20);
                        ToastMessage.show();
                    }
                }
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

    private void registro(){
        final String cuenta = this.cuenta.getText().toString().trim();
        final String correo = this.correo.getText().toString().trim();
        final String contra = this.contra.getText().toString().trim();
        final String facultad = this.facultad.getSelectedItem().toString();
        final String carrera = this.carrera.getSelectedItem().toString();
        final String semestre = this.semestre.getSelectedItem().toString();
        final String nombre = getIntent().getStringExtra("nombre");
        final String apellido = getIntent().getStringExtra("apellido");
        final String fecha = getIntent().getStringExtra("fecha");

        if(!cuenta.isEmpty() && !correo.isEmpty() && !contra.isEmpty() && !facultad.isEmpty() && !carrera.isEmpty() && !semestre.isEmpty() && !nombre.isEmpty() && !apellido.isEmpty() && !fecha.isEmpty()){
            StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_REGISTRO, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    try {
                        JSONObject jsonObject = new JSONObject(response);
                        String success = jsonObject.getString("success");

                        if(success.equals("1")){
                            Toast.makeText(Registro2.this,"Se registro con éxito!",Toast.LENGTH_SHORT).show();
                            setContentView(R.layout.animacion_registro);
                            new Handler().postDelayed(new Runnable() {
                                @Override
                                public void run() {
                                    Intent main = new Intent(Registro2.this,Login.class);
                                    startActivity(main);
                                    finish();
                                }
                            },animacion);
                        }else if(success.equals("2")){
                            Toast ToastMessage = Toast.makeText(Registro2.this,"Lo sentimos, el numero de cuenta ya se encuentra registrado",Toast.LENGTH_SHORT);
                            View toastView = ToastMessage.getView();
                            toastView.setBackgroundResource(R.drawable.shadowred);
                            toastView.setPadding(20,20,20,20);
                            ToastMessage.show();
                        }
                    }catch(JSONException e){
                        Toast.makeText(Registro2.this,"Error al registrarse (Catch)" + e.toString(), Toast.LENGTH_SHORT).show();
                    }
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(Registro2.this,"Error al registrarse (Volley)" + error.toString(), Toast.LENGTH_SHORT).show();
                }
            }){
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();
                    params.put("no_cuenta",cuenta);
                    params.put("password",contra);
                    params.put("nombres",nombre);
                    params.put("apellidos",apellido);
                    params.put("semestre",semestre);
                    params.put("correo",correo);
                    params.put("nacimiento",fecha);
                    params.put("carrera",carrera);
                    params.put("facultad",facultad);

                    return params;
                }
            };

            RequestQueue requestQueue = Volley.newRequestQueue(this);
            requestQueue.add(stringRequest);
        }else{
            Toast ToastMessage = Toast.makeText(Registro2.this,"Por favor llene todos los campos",Toast.LENGTH_SHORT);
            View toastView = ToastMessage.getView();
            toastView.setBackgroundResource(R.drawable.redondearbordes);
            toastView.setPadding(20,20,20,20);
            ToastMessage.show();
        }
    }//Fin metodo Registro

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        String facultad = parent.getItemAtPosition(position).toString();
    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }
}