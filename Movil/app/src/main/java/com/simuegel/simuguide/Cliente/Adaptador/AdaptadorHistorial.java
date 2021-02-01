package com.simuegel.simuguide.Cliente.Adaptador;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;
import com.simuegel.simuguide.Cliente.VerHistorial;
import com.simuegel.simuguide.R;

import java.util.List;

public class AdaptadorHistorial extends RecyclerView.Adapter<AdaptadorHistorial.ClienteViewHolder> {
    private Context mCtx;
    private List<VerHistorial> listadoHistorial;

    public AdaptadorHistorial(Context mCtx, List<VerHistorial> listadoHistorial){
        this.mCtx = mCtx;
        this.listadoHistorial = listadoHistorial;
    }

    @Override
    public ClienteViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.contenedor_historial, null, false);
        return new ClienteViewHolder(view);
    }

    @Override
    public void onBindViewHolder(ClienteViewHolder holder, int position) {
        VerHistorial historial = listadoHistorial.get(position);

        holder.examen.setText(""+historial.getExamen());
        holder.area.setText(""+historial.getArea());
        holder.subarea.setText(""+historial.getSubarea());
        holder.hora_ini.setText(""+historial.getHora_Inicio());
        holder.hora_fin.setText(""+historial.getHora_Final());
        holder.no_preg.setText(""+historial.getNo_Preguntas());
        holder.resultado.setText(""+historial.getResultado());
    }

    @Override
    public int getItemCount() {
        return listadoHistorial.size();
    }

    public class ClienteViewHolder extends RecyclerView.ViewHolder{
        TextView examen, area, subarea, hora_ini, hora_fin, no_preg, resultado;
        public ClienteViewHolder(View view) {
            super(view);

            examen = view.findViewById(R.id.examen);
            area = view.findViewById(R.id.areaH);
            subarea = view.findViewById(R.id.subareaH);
            hora_ini = view.findViewById(R.id.hora_ini);
            hora_fin = view.findViewById(R.id.hora_fin);
            no_preg = view.findViewById(R.id.no_preg);
            resultado = view.findViewById(R.id.resultadoH);
        }
    }
}
