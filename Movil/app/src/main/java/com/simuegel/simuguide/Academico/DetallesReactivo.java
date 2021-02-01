package com.simuegel.simuguide.Academico;

import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;

import android.app.FragmentTransaction;
import android.os.Bundle;
import android.os.Handler;
import android.text.method.ScrollingMovementMethod;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.simuegel.simuguide.Academico.Academico_Fragments.Menu_lista;
import com.simuegel.simuguide.Academico.Academico_Fragments.Menu_revisar;
import com.simuegel.simuguide.R;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DetallesReactivo extends AppCompatActivity {
    TextView propuesto, comentario,textoComentario, pregunta, area, subarea, tipo;
    EditText agregarComentario;
    String id, propuestoD,comentarioD, preguntaD, areaD, subareaD; int tipoD;
    //ImageButton bien, mal, enviar;
    ImageButton enviar;
    Button bien, mal;

    private static String URL = "https://pruebasrecompensas.app1.mx/db/subirComentario.php";
    private static String URL_APROBAR = "https://pruebasrecompensas.app1.mx/db/aprobarPregunta.php";

    //private static String URL = "http://192.168.1.100/db/subirComentario.php";
    //private static String URL_APROBAR = "http://192.168.1.100/db/aprobarPregunta.php";
    private static  int animacion = 3000;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detalles_reactivo);



        propuesto = (TextView)findViewById(R.id.propuestoD);
        comentario = (TextView)findViewById(R.id.comentarioD);
        textoComentario = (TextView)findViewById(R.id.textView10);
        pregunta = (TextView)findViewById(R.id.preguntaD);
        area = (TextView)findViewById(R.id.areaD);
        subarea = (TextView)findViewById(R.id.subD);
        tipo = (TextView)findViewById(R.id.tipoD);
        agregarComentario = (EditText)findViewById(R.id.agregarComentario);

        //bien = (ImageButton)findViewById(R.id.bien);
        //mal = (ImageButton)findViewById(R.id.mal);
        bien = (Button)findViewById(R.id.bien);
        mal = (Button)findViewById(R.id.mal);
        enviar = (ImageButton)findViewById(R.id.BotonEnviar);

        id = getIntent().getStringExtra("id");
        propuestoD = getIntent().getStringExtra("propuesto");
        comentarioD = getIntent().getStringExtra("comentario");
        preguntaD = getIntent().getStringExtra("nombre");
        areaD = getIntent().getStringExtra("area");
        subareaD = getIntent().getStringExtra("subarea");


        if(comentarioD.equals("null")){
            comentario.setVisibility(View.GONE);
            textoComentario.setVisibility(View.GONE);
        }else{
            comentario.setVisibility(View.VISIBLE);
            textoComentario.setVisibility(View.VISIBLE);
        }
        //tipoD = getIntent().getIntExtra("tipox", 0);

        propuesto.setText(propuestoD);
        comentario.setText(comentarioD);
        pregunta.setText(preguntaD);
        area.setText(areaD);
        subarea.setText(subareaD);
        pregunta.setMovementMethod(new ScrollingMovementMethod());
        //tipo.setText(tipoD);

        enviar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String agregar = agregarComentario.getText().toString().trim();
                StringRequest request = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject object = new JSONObject(response);
                            String success = object.getString("success");

                            if(success.equals("1")){
                                Toast.makeText(DetallesReactivo.this,"Comentario agregado!", Toast.LENGTH_SHORT).show();
                            }

                        }catch(JSONException e){
                            Toast.makeText(DetallesReactivo.this,"Error al subir el comentario", Toast.LENGTH_SHORT).show();
                        }
                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(DetallesReactivo.this,"Error"+error.toString(), Toast.LENGTH_SHORT).show();
                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String, String> params = new HashMap<>();
                        params.put("id", id);
                        params.put("comentario",agregar);
                        return params;
                    }
                };

                RequestQueue requestQueue = Volley.newRequestQueue(DetallesReactivo.this);
                requestQueue.add(request);
            }
        });

        bien.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String cuenta = getIntent().getStringExtra("cuenta");
                StringRequest request = new StringRequest(Request.Method.POST, URL_APROBAR, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject object = new JSONObject(response);
                            String success = object.getString("success");

                            if(success.equals("1")){
                                Toast.makeText(DetallesReactivo.this,"Pregunta aprobada", Toast.LENGTH_SHORT).show();
                                setContentView(R.layout.animacion_registro);
                                new Handler().postDelayed(new Runnable() {
                                    @Override
                                    public void run() {
                                        finish();
                                    }
                                },animacion);

                            }else if(success.equals("0")){
                                Toast.makeText(DetallesReactivo.this,"Pregunta rechazada", Toast.LENGTH_SHORT).show();
                            }

                        }catch(JSONException e){
                            Toast.makeText(DetallesReactivo.this,"Error al subir el comentario", Toast.LENGTH_SHORT).show();
                        }
                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(DetallesReactivo.this,"Error"+error.toString(), Toast.LENGTH_SHORT).show();
                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String, String> params = new HashMap<>();
                        params.put("id", id);
                        params.put("cuenta",cuenta);
                        return params;
                    }
                };

                RequestQueue requestQueue = Volley.newRequestQueue(DetallesReactivo.this);
                requestQueue.add(request);
            }
        });

        mal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

            }
        });
    }
}
