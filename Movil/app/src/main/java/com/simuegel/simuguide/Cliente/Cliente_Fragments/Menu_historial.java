package com.simuegel.simuguide.Cliente.Cliente_Fragments;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

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
import com.simuegel.simuguide.Academico.Academico_Fragments.Menu_revisar;
import com.simuegel.simuguide.Cliente.Adaptador.AdaptadorHistorial;
import com.simuegel.simuguide.Cliente.VerHistorial;
import com.simuegel.simuguide.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Menu_historial extends Fragment {
    //Localhost
    //private static String URL_VIEW = "http://192.168.1.64/db/viewHistorial.php";
    private static String URL_VIEW ="https://pruebasrecompensas.app1.mx/db/viewHistorial.php";
    List<VerHistorial> verHistorial;
    RecyclerView recyclerView;
    String cuenta, cuentasinguardar, URL_GET;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        verHistorial = new ArrayList<>();
        if(getArguments() != null){
            cuenta = getArguments().getString("no_cuenta_alumno");
            cuentasinguardar = getArguments().getString("no_cuenta_alumn");
        }

        cargarHistorial();
    }

    private void cargarHistorial() {
        if(cuenta != null){
            URL_GET = URL_VIEW+"?no_cuenta="+cuenta;
        }else if(cuentasinguardar != null){
            URL_GET = URL_VIEW+"?no_cuenta="+cuentasinguardar;
        }

        final StringRequest request = new StringRequest(Request.Method.GET, URL_GET,     new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                if(!"null".equals(response)){
                    try {
                        JSONObject jsonObject = new JSONObject(response);
                        JSONArray jsonArray = jsonObject.getJSONArray("historial");

                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject object = jsonArray.getJSONObject(i);
                            verHistorial.add(new VerHistorial(
                                    object.getInt("no_preguntas"),
                                    object.getInt("resultado"),
                                    object.getString("hora_inicio"),
                                    object.getString("hora_funal"),
                                    object.getString("subarea"),
                                    object.getString("area"),
                                    object.getString("examen")
                            ));
                        }
                        AdaptadorHistorial adaptadorHisotrial = new AdaptadorHistorial(getContext(), verHistorial);
                        recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                        recyclerView.setAdapter(adaptadorHisotrial);

                    } catch (JSONException e) {
                        e.printStackTrace();
                        Toast.makeText(Menu_historial.this.getActivity(), "Error catch: "+e.toString(), Toast.LENGTH_SHORT).show();
                    }
                }else{
                    Toast ToastMessage = Toast.makeText(Menu_historial.this.getActivity(),"No se encontraron registros",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Menu_historial.this.getActivity(),"Error volley "+error.toString(),Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(Menu_historial.this.getContext());
        requestQueue.add(request);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.menu_historial, container, false);
        recyclerView = (RecyclerView)view.findViewById(R.id.historial);
        return view;
    }
}
