package com.simuegel.simuguide.Cliente.Cliente_Fragments;

import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.simuegel.simuguide.Cliente.Adaptador.AdaptadorPerfil;
import com.simuegel.simuguide.Cliente.VerPerfil;
import com.simuegel.simuguide.Login;
import com.simuegel.simuguide.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Menu_perfil extends Fragment {
    //private static String URL_VIEW ="http://192.168.1.64/db/viewPerfil.php";
    private static String URL_VIEW ="https://pruebasrecompensas.app1.mx/db/viewPerfil.php";
    String cuenta, cuentasinguardar, URL_GET, nombres, apellidos, facultades, carreras, semestres, cuentas, email;
    List<VerPerfil> verPerfils;
    RecyclerView recyclerView;
    Button cerrarSesion;
    TextView name,facu, carre, grado, numero, correo;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        verPerfils = new ArrayList<>();
        if(getArguments() != null){
            cuenta = getArguments().getString("no_cuenta_alumno");
            cuentasinguardar = getArguments().getString("no_cuenta_alumn");
        }

        cargarPerfil();
    }

    private void cargarPerfil() {

        if(cuenta != null){
            URL_GET = URL_VIEW+"?no_cuenta="+cuenta;
        }else if(cuentasinguardar != null){
            URL_GET = URL_VIEW+"?no_cuenta="+cuentasinguardar;
        }


        StringRequest request = new StringRequest(Request.Method.GET, URL_GET,     new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                if(!response.equals("null")) {
                    try {
                        JSONObject jsonObject = new JSONObject(response);
                        JSONArray jsonArray = jsonObject.getJSONArray("perfil");

                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject object = jsonArray.getJSONObject(i);
                            verPerfils.add(new VerPerfil(
                                    nombres = object.getString("nombres"),
                                    apellidos = object.getString("apellidos"),
                                    facultades = object.getString("facultad"),
                                    carreras = object.getString("carrera"),
                                    semestres = object.getString("semestre"),
                                    cuentas = object.getString("cuenta"),
                                    email = object.getString("email")
                            ));
                        }

                        name.setText(nombres + " " + apellidos);
                        facu.setText(facultades);
                        carre.setText(carreras);
                        grado.setText(semestres);
                        numero.setText(cuentas);
                        correo.setText(email);
                        //AdaptadorPerfil adaptadorPerfil = new AdaptadorPerfil(getContext(), verPerfils);
                        //recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                        //recyclerView.setHasFixedSize(true);
                        //recyclerView.setAdapter(adaptadorPerfil);

                    } catch (JSONException e) {
                        e.printStackTrace();
                        Toast.makeText(Menu_perfil.this.getActivity(), "No tiene ningún registro"+e.toString(), Toast.LENGTH_SHORT).show();
                    }
                }else{
                    Toast ToastMessage = Toast.makeText(Menu_perfil.this.getActivity(),"No se encontraron registros",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Menu_perfil.this.getActivity(),"Error volley "+error.toString(),Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(Menu_perfil.this.getActivity());
        requestQueue.add(request);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.contenedor_perfil,container,false);
        name = (TextView)view.findViewById(R.id.name);
        facu = (TextView)view.findViewById(R.id.facu);
        carre = (TextView)view.findViewById(R.id.carre);
        grado = (TextView)view.findViewById(R.id.grado);
        numero = (TextView)view.findViewById(R.id.numero);
        correo = (TextView)view.findViewById(R.id.correos);
        cerrarSesion = (Button)view.findViewById(R.id.cerrarSesion);

        cerrarSesion.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Login.cerrarSesionAlumno(Menu_perfil.this.getActivity(),false);
                startActivity(new Intent(getActivity(),Login.class));
            }
        });

        return view;
    }
}