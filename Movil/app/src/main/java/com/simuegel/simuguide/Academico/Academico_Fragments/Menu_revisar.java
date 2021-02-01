package com.simuegel.simuguide.Academico.Academico_Fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Adapter;
import android.widget.Toast;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.simuegel.simuguide.Academico.Adaptador.AdaptadorPreguntas;
import com.simuegel.simuguide.Academico.PreguntasDocentes;
import com.simuegel.simuguide.Cliente.Cliente_Fragments.Menu_historial;
import com.simuegel.simuguide.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Menu_revisar extends Fragment {
    //Localhost
    //private static String URL_VIEW = "http://192.168.1.100/db/viewPreguntas.php";
    private static String URL_VIEW ="https://pruebasrecompensas.app1.mx/db/viewPreguntas.php";
    List<PreguntasDocentes> preguntasDocentes;
    RecyclerView recyclerView;
    SwipeRefreshLayout swipe;
    AdaptadorPreguntas adaptadorPreguntas;
    String cuenta, cuentasinguardar, URL_DATA;

   /* public static Menu_revisar newInstance(){
        return new Menu_revisar();
    } */

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
        preguntasDocentes = new ArrayList<>();
        if(getArguments() != null){
            cuenta = getArguments().getString("no_cuenta_academico");
            cuentasinguardar = getArguments().getString("no_cuenta_academic");
        }

        //cargarPreguntas();
        if(cuenta != null){
            URL_DATA = URL_VIEW + "?no_cuenta=" + cuenta;
        }else if(cuentasinguardar!= null){
            URL_DATA = URL_VIEW+"?no_cuenta="+cuentasinguardar;
        }

        StringRequest request = new StringRequest(Request.Method.GET, URL_DATA,new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                preguntasDocentes.clear();
                if(!response.equals("null")){
                    try {
                        JSONObject jsonObject = new JSONObject(response);
                        JSONArray jsonArray = jsonObject.getJSONArray("preguntas");

                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject object = jsonArray.getJSONObject(i);
                            preguntasDocentes.add(new PreguntasDocentes(
                                    object.getString("id"),
                                    object.getString("nombre"),
                                    object.getString("tipo"),
                                    object.getString("comentario"),
                                    object.getString("propuesto"),
                                    object.getString("area"),
                                    object.getString("subarea"),
                                    object.getString("numero"),
                                    object.getString("corto")

                            ));
                        }
                        adaptadorPreguntas = new AdaptadorPreguntas(getContext(), preguntasDocentes);
                        recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                        recyclerView.setAdapter(adaptadorPreguntas);

                        swipe.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
                            @Override
                            public void onRefresh() {
                                adaptadorPreguntas.notifyDataSetChanged();
                                swipe.setRefreshing(false);
                            }
                        });

                    } catch (JSONException e) {
                        e.printStackTrace();
                        Toast.makeText(Menu_revisar.this.getActivity(), "No se encontraron registros ", Toast.LENGTH_SHORT).show();
                    }
                }else{
                    Toast ToastMessage = Toast.makeText(Menu_revisar.this.getActivity(),"No se encontraron registros",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Menu_revisar.this.getActivity(),"Error volley "+error.toString(),Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(Menu_revisar.this.getContext());
        requestQueue.add(request);

    }

     private void carga() {
        if(cuenta != null){
            URL_DATA = URL_VIEW + "?no_cuenta=" + cuenta;
        }else if(cuentasinguardar!= null){
            URL_DATA = URL_VIEW+"?no_cuenta="+cuentasinguardar;
        }

        StringRequest request = new StringRequest(Request.Method.GET, URL_DATA,new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                preguntasDocentes.clear();
                if(!response.equals("null")){
                    try {
                        JSONObject jsonObject = new JSONObject(response);
                        JSONArray jsonArray = jsonObject.getJSONArray("preguntas");

                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject object = jsonArray.getJSONObject(i);
                            preguntasDocentes.add(new PreguntasDocentes(
                                    object.getString("id"),
                                    object.getString("nombre"),
                                    object.getString("tipo"),
                                    object.getString("comentario"),
                                    object.getString("propuesto"),
                                    object.getString("area"),
                                    object.getString("subarea"),
                                    object.getString("numero"),
                                    object.getString("corto")

                            ));
                        }
                        AdaptadorPreguntas adaptadorPreguntas = new AdaptadorPreguntas(getActivity(), preguntasDocentes);
                        recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                        recyclerView.setAdapter(adaptadorPreguntas);

                    } catch (JSONException e) {
                        e.printStackTrace();
                        Toast.makeText(Menu_revisar.this.getActivity(), "No se encontraron registros ", Toast.LENGTH_SHORT).show();
                    }
                }else{
                    Toast ToastMessage = Toast.makeText(Menu_revisar.this.getActivity(),"No se encontraron registros",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Menu_revisar.this.getActivity(),"Error volley "+error.toString(),Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(Menu_revisar.this.getContext());
        requestQueue.add(request);

    }//Fin metodo carga

   /* private void cargarPreguntas() {
        StringRequest request = new StringRequest(Request.Method.GET, URL_VIEW, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject jsonObject = new JSONObject(response);
                    JSONArray jsonArray = jsonObject.getJSONArray("preguntas");

                    for (int i = 0; i < jsonArray.length(); i++) {
                        JSONObject object = jsonArray.getJSONObject(i);
                        preguntasDocentes.add(new PreguntasDocentes(
                                object.getInt("id"),
                                object.getString("nombre"),
                                object.getString("tipo"),
                                object.getString("comentario"),
                                object.getString("propuesto"),
                                object.getString("area"),
                                object.getString("subarea")
                        ));
                    }

                    AdaptadorPreguntas adaptadorPreguntas = new AdaptadorPreguntas(getContext(), preguntasDocentes);
                    recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                    recyclerView.setAdapter(adaptadorPreguntas);
                } catch (JSONException e) {
                    e.printStackTrace();
                    Toast.makeText(Menu_revisar.this.getActivity(), "Error catch " + e.toString(), Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Menu_revisar.this.getActivity(),"Error volley "+error.toString(),Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(Menu_revisar.this.getContext());
        requestQueue.add(request);
    }*/

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.menu_revisar, container, false);
        recyclerView = (RecyclerView)view.findViewById(R.id.revisar);
        swipe = (SwipeRefreshLayout)view.findViewById(R.id.swipe);
        return view;
    }
}
