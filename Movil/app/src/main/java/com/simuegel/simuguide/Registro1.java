package com.simuegel.simuguide;

import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
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

import java.io.Serializable;
import java.util.Calendar;
import java.util.HashMap;
import java.util.Map;

public class Registro1 extends AppCompatActivity {
    EditText  nombres, apellidos;
    TextView nacimiento;
    Button siguiente;
    DatePickerDialog.OnDateSetListener setListener;
    String db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.registro);

        nombres = (EditText)findViewById(R.id.nombres);
        apellidos = (EditText)findViewById(R.id.apellidos);
        nacimiento = (TextView)findViewById(R.id.nacimiento);
        siguiente = (Button)findViewById(R.id.siguiente);

        Calendar calendar = Calendar.getInstance();
        final int anio = calendar.get(Calendar.YEAR);
        final int mes = calendar.get(Calendar.MONTH);
        final int dia = calendar.get(Calendar.DAY_OF_MONTH);

        nacimiento.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DatePickerDialog datePickerDialog = new DatePickerDialog(
                        Registro1.this, new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker view, int anio, int mes, int dia) {

                        String dias = dia+"",meses = mes + "";
                        if(dia < 10) {
                            dias = "0"+dia;
                        }
                        if(mes < 10) {
                            meses = "0" + mes;
                        }

                        String fecha = dias+"/"+meses+"/"+anio;
                        db = anio+"-"+mes+"-"+dia;
                        nacimiento.setText(fecha);
                    }
                },dia,mes,anio);
                datePickerDialog.show();
            }
        });

        siguiente.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String apellido = apellidos.getText().toString().trim();
                final String nombre = nombres.getText().toString().trim();
                final String fecha = db;

                if(!nombre.isEmpty() && !apellido.isEmpty() && !fecha.isEmpty()){
                    Intent paso2 = new Intent(Registro1.this,Registro2.class);
                    paso2.putExtra("nombre",nombre);
                    paso2.putExtra("apellido",apellido);
                    paso2.putExtra("fecha",fecha);
                    startActivity(paso2);
                }else{
                    Toast ToastMessage = Toast.makeText(Registro1.this,"Por favor llene todos los campos",Toast.LENGTH_SHORT);
                    View toastView = ToastMessage.getView();
                    toastView.setBackgroundResource(R.drawable.redondearbordes);
                    toastView.setPadding(20,20,20,20);
                    ToastMessage.show();
                }
            }
        });
    }
}
