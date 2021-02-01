package com.simuegel.simuguide.Academico.Academico_Fragments;

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
import com.simuegel.simuguide.Academico.Adaptador.AdaptadorListado;
import com.simuegel.simuguide.Academico.ListadoDocentes;
import com.simuegel.simuguide.Cliente.Cliente_Fragments.Menu_historial;
import com.simuegel.simuguide.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Menu_lista extends Fragment {
    //Localhost
    //private static String URL_VIEW = "http://192.168.1.100/db/viewDocente.php";
    private static String URL_VIEW ="https://pruebasrecompensas.app1.mx/db/viewDocente.php";
    String cuenta, cuentasinguardar;

    List<ListadoDocentes> listadoDocentes;
    RecyclerView recyclerView;

   /* public static Menu_lista newInstance(){
        return new Menu_lista();
    } */

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
        listadoDocentes = new ArrayList<>();
        if(getArguments() != null){
            cuenta = getArguments().getString("no_cuenta_academico");
            cuentasinguardar = getArguments().getString("no_cuenta_academic");
        }

        cargarLista();
    }

    private void cargarLista() {
        StringRequest request = new StringRequest(Request.Method.GET, URL_VIEW,     new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                if(!response.equals("null")){
                    try {
                        JSONObject jsonObject = new JSONObject(response);
                        JSONArray jsonArray = jsonObject.getJSONArray("usuarios");

                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject object = jsonArray.getJSONObject(i);
                            listadoDocentes.add(new ListadoDocentes(
                                    object.getInt("id"),
                                    object.getString("nombres"),
                                    object.getString("carrera"),
                                    object.getString("email"),
                                    object.getString("cuenta")
                            ));
                        }
                        AdaptadorListado adaptadorListado = new AdaptadorListado(getContext(), listadoDocentes);
                        recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                        recyclerView.setAdapter(adaptadorListado);

                    } catch (JSONException e) {
                        e.printStackTrace();
                        Toast.makeText(Menu_lista.this.getActivity(), "Error catch " + e.toString(), Toast.LENGTH_SHORT).show();
                    }
                }else{
                    Toast ToastMessage = Toast.makeText(Menu_lista.this.getActivity(),"No se encontraron registros",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Menu_lista.this.getActivity(),"Error volley "+error.toString(),Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(Menu_lista.this.getContext());
        requestQueue.add(request);
    }

    @Override
    public View onCreateView(LayoutInflater inflater,ViewGroup container,Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.menu_lista, container, false);
        recyclerView = (RecyclerView)view.findViewById(R.id.lista);
        return view;
    }
}
