package com.simuegel.simuguide.Docente.Adaptador;

import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.simuegel.simuguide.Docente.HistorialPreguntas;
import com.simuegel.simuguide.R;

import java.util.List;

public class AdaptadorHistorialPreguntas extends RecyclerView.Adapter<AdaptadorHistorialPreguntas.AdaptadorHistorialHolderView> {
    private Context mCtx;
    List<HistorialPreguntas> historialPreguntasList;

    public AdaptadorHistorialPreguntas(Context mCtx, List<HistorialPreguntas> historialPreguntasList) {
        this.mCtx = mCtx;
        this.historialPreguntasList = historialPreguntasList;
    }

    @Override
    public AdaptadorHistorialHolderView onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.contenedor_historial_preguntas,null, false);
        return new AdaptadorHistorialHolderView(view);
    }

    @Override
    public void onBindViewHolder(AdaptadorHistorialHolderView holder, int position) {
        HistorialPreguntas preguntas = historialPreguntasList.get(position);

        holder.nombre.setText(preguntas.getNombre());
        holder.tipo.setText(preguntas.getTipo());
        holder.registro.setText(preguntas.getRegistro());
    }

    @Override
    public int getItemCount() {
        return historialPreguntasList.size();
    }


    public class AdaptadorHistorialHolderView extends RecyclerView.ViewHolder {
        TextView nombre, tipo, registro;
        RelativeLayout content;

        public AdaptadorHistorialHolderView(View itemView) {
            super(itemView);
            nombre = itemView.findViewById(R.id.TituloHP);
            tipo = itemView.findViewById(R.id.TipoHP);
            registro = itemView.findViewById(R.id.registroHP);
            content = itemView.findViewById(R.id.content2);
        }
    }
}
