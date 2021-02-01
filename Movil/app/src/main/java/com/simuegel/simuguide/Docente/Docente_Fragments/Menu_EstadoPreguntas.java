package com.simuegel.simuguide.Docente.Docente_Fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import androidx.annotation.ContentView;
import androidx.coordinatorlayout.widget.CoordinatorLayout;
import androidx.core.content.ContextCompat;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.material.snackbar.Snackbar;
import com.simuegel.simuguide.Cliente.Cliente_Fragments.Menu_historial;
import com.simuegel.simuguide.Docente.Adaptador.AdaptadorEstadoPreguntas;
import com.simuegel.simuguide.Docente.EstadoPregunta;
import com.simuegel.simuguide.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Menu_EstadoPreguntas extends Fragment {
    //private static String URL_VIEW = "http://192.168.1.70/db/estadoPreguntas.php";
    private static String URL_VIEW ="https://pruebasrecompensas.app1.mx/db/estadoPreguntas.php";
    List<EstadoPregunta> listadoPregunta;
    RecyclerView recyclerView;
    String cuenta, cuentasinguardar, URL_GET;
    CoordinatorLayout coordinatorLayout;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        listadoPregunta = new ArrayList<>();
        if(getArguments() != null){
            cuenta = getArguments().getString("no_cuenta_docente");
            cuentasinguardar = getArguments().getString("no_cuenta_docent");
        }

        estadopreguntas();
    }

    private void estadopreguntas() {
        if(cuenta != null){
            URL_GET = URL_VIEW+"?no_cuenta="+cuenta;
        }else if(cuentasinguardar != null){
            URL_GET = URL_VIEW+"?no_cuenta="+cuentasinguardar;
        }

        StringRequest request = new StringRequest(Request.Method.GET, URL_GET, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                if(!response.equals("null")){
                    try {
                        JSONObject jsonObject = new JSONObject(response);
                        JSONArray jsonArray = jsonObject.getJSONArray("estados");

                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject object = jsonArray.getJSONObject(i);

                            listadoPregunta.add(new EstadoPregunta(
                                    object.getString("nombre"),
                                    object.getString("tipo"),
                                    object.getString("comentario"),
                                    object.getString("estado")
                            ));

                        }

                        recyclerView.setLayoutManager(new LinearLayoutManager(Menu_EstadoPreguntas.this.getActivity()));
                        recyclerView.setHasFixedSize(true);
                        AdaptadorEstadoPreguntas adaptadorEstado = new AdaptadorEstadoPreguntas(getContext(), listadoPregunta);
                        recyclerView.setAdapter(adaptadorEstado);

                    } catch (JSONException e) {
                        e.printStackTrace();
                        //Toast.makeText(Menu_EstadoPreguntas.this.getActivity(), "No se encontraron datos", Toast.LENGTH_SHORT).show();
                        Snackbar snackbar = Snackbar.make(getActivity().findViewById(R.id.Docente),"No se encontraron datos",Snackbar.LENGTH_SHORT);
                        snackbar.getView().setBackgroundColor(ContextCompat.getColor(getActivity(),R.color.colorAccent));
                        snackbar.show();
                    }
                }else{
                    Toast ToastMessage = Toast.makeText(Menu_EstadoPreguntas.this.getActivity(),"No se encontraron registros",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Menu_EstadoPreguntas.this.getActivity(),"Error volley: "+error.toString(),Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(Menu_EstadoPreguntas.this.getContext());
        requestQueue.add(request);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.menu_estado,container,false);
        recyclerView = (RecyclerView)view.findViewById(R.id.estado);
        return view;
    }
}
