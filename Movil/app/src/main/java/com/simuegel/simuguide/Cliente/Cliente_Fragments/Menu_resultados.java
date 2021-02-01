package com.simuegel.simuguide.Cliente.Cliente_Fragments;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.NetworkResponse;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.simuegel.simuguide.Cliente.Adaptador.AdaptadorHistorial;
import com.simuegel.simuguide.Cliente.Adaptador.AdaptadorResultados;
import com.simuegel.simuguide.Cliente.VerGraficas;
import com.simuegel.simuguide.Cliente.VerHistorial;
import com.simuegel.simuguide.Docente.Docente_Fragments.Menu_HistorialPreguntas;
import com.simuegel.simuguide.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

import static androidx.core.content.ContextCompat.getSystemService;

public class Menu_resultados extends Fragment {
    //private static String URL_VIEW = "http://192.168.1.64/db/viewGraficas.php";
    private static String URL_VIEW ="https://pruebasrecompensas.app1.mx/db/viewGraficas.php";
    List<VerGraficas> verGraficas;
    RecyclerView recyclerView;
    String cuenta, cuentasinguardar, URL_GET;
    /*
    public static Menu_historial newInstance(){
        return new Menu_historial();
    } */

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);



        verGraficas = new ArrayList<>();
        if(getArguments() != null){
            cuenta = getArguments().getString("no_cuenta_alumno");
            cuentasinguardar = getArguments().getString("no_cuenta_alumn");
        }

        ConnectivityManager connectivityManager = (ConnectivityManager) getContext().getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connectivityManager.getActiveNetworkInfo();

        if(networkInfo!= null && networkInfo.isConnected()){
            cargarGraficas();
        }else{
            Toast.makeText(Menu_resultados.this.getActivity(), "No hay internet", Toast.LENGTH_SHORT).show();
        }
        //cargarGraficas();
    }

    private void cargarGraficas() {

        if(cuenta != null){
            URL_GET = URL_VIEW+"?no_cuenta="+cuenta;
        }else if(cuentasinguardar != null){
            URL_GET = URL_VIEW+"?no_cuenta="+cuentasinguardar;
        }


        final StringRequest request = new StringRequest(Request.Method.GET, URL_GET, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                if(!response.equals("null")){
                    try {
                        JSONObject jsonObject = new JSONObject(response);
                        JSONArray jsonArray = jsonObject.getJSONArray("graficas");

                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject object = jsonArray.getJSONObject(i);
                            verGraficas.add(new VerGraficas(
                                    object.getInt("no_preguntas"),
                                    object.getInt("resultado")
                            ));
                        }
                        AdaptadorResultados adaptadorGraficas = new AdaptadorResultados(getContext(),verGraficas);
                        recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                        recyclerView.setHasFixedSize(true);
                        recyclerView.setAdapter(adaptadorGraficas);


                    }catch (JSONException e) {
                        e.printStackTrace();
                        Toast.makeText(Menu_resultados.this.getActivity(), "Error Catch: " + e.toString(), Toast.LENGTH_SHORT).show();
                    }
                }else{
                    //Toast.makeText(Menu_resultados.this.getActivity(), "No se encontraron registros", Toast.LENGTH_SHORT).show();
                    Toast ToastMessage = Toast.makeText(Menu_resultados.this.getActivity(),"No se encontraron registros",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Menu_resultados.this.getActivity(),"Error volley "+error.toString(),Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(Menu_resultados.this.getContext());
        requestQueue.add(request);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.menu_resultado, container, false);
        recyclerView = (RecyclerView)view.findViewById(R.id.resultado);
        return view;
    }
}
