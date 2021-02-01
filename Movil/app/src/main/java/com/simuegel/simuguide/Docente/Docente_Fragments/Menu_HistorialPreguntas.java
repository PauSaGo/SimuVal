package com.simuegel.simuguide.Docente.Docente_Fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;


import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.simuegel.simuguide.Cliente.Cliente_Fragments.Menu_historial;
import com.simuegel.simuguide.Docente.Adaptador.AdaptadorHistorialPreguntas;
import com.simuegel.simuguide.Docente.HistorialPreguntas;
import com.simuegel.simuguide.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;
import java.util.Objects;

public class Menu_HistorialPreguntas extends Fragment {
    List<HistorialPreguntas> historialPreguntasList;
    RecyclerView recyclerView;
    //private static String URL = "http://192.168.1.70/db/historialPreguntas.php";
    private static String URL ="https://pruebasrecompensas.app1.mx/db/historialPreguntas.php";
    String cuenta, cuentasinguardar, URL_GET;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        historialPreguntasList = new ArrayList<>();
        if(getArguments() != null){
            cuenta = getArguments().getString("no_cuenta_docente");
            cuentasinguardar = getArguments().getString("no_cuenta_docent");
        }
        historitalPreguntas();
    }

    private void historitalPreguntas() {
        if(cuenta != null){
            URL_GET = URL+"?no_cuenta="+cuenta;
        }else if(cuentasinguardar != null){
            URL_GET = URL+"?no_cuenta="+cuentasinguardar;
        }

        StringRequest request = new StringRequest(Request.Method.GET, URL_GET, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                if(!response.equals("null")){
                    try {
                        JSONObject jsonObject = new JSONObject(response);
                        JSONArray jsonArray = jsonObject.getJSONArray("historialpregunta");

                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject object = jsonArray.getJSONObject(i);
                            historialPreguntasList.add(new HistorialPreguntas(
                                    object.getString("nombre"),
                                    object.getString("tipo"),
                                    object.getString("registro")
                            ));
                        }

                        AdaptadorHistorialPreguntas adaptadorPregunta = new AdaptadorHistorialPreguntas(getContext(), historialPreguntasList);
                        recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                        recyclerView.setHasFixedSize(true);
                        recyclerView.setAdapter(adaptadorPregunta);

                    } catch (JSONException e) {
                        e.printStackTrace();
                        //Toast.makeText(Menu_HistorialPreguntas.this.getActivity(), "Error catch " + e.toString(), Toast.LENGTH_SHORT).show();
                        //StyleableToast.makeText(Menu_HistorialPreguntas.this.getActivity(), "Hello World!", Toast.LENGTH_LONG).show();
                    }
                }else{
                    Toast ToastMessage = Toast.makeText(Menu_HistorialPreguntas.this.getActivity(),"No se encontraron registros",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Menu_HistorialPreguntas.this.getActivity(),"Error volley "+error.toString(),Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(Menu_HistorialPreguntas.this.getContext());
        requestQueue.add(request);
    }



    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.menu_historial_pregunta,container,false);
        recyclerView = (RecyclerView)view.findViewById(R.id.historialpregunta);
        return view;
    }
}
