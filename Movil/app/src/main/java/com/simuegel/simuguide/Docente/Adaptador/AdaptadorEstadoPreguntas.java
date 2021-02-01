package com.simuegel.simuguide.Docente.Adaptador;

import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;
import android.widget.TextView;
import androidx.recyclerview.widget.RecyclerView;

import com.simuegel.simuguide.Docente.EstadoPregunta;
import com.simuegel.simuguide.R;

import java.util.List;

public class AdaptadorEstadoPreguntas extends RecyclerView.Adapter<AdaptadorEstadoPreguntas.AdaptadorViewHolder>{
    private Context mCtx;
    private List<EstadoPregunta> listadoPreguntas;

    public AdaptadorEstadoPreguntas(Context mCtx, List<EstadoPregunta> listadoPreguntas) {
        this.mCtx = mCtx;
        this.listadoPreguntas = listadoPreguntas;
    }

    @Override
    public AdaptadorViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.contenedor_estado_pregunta,null,false);
        return new AdaptadorViewHolder(view);
    }

    @Override
    public void onBindViewHolder(AdaptadorViewHolder holder, int position) {
        EstadoPregunta estados = listadoPreguntas.get(position);

        holder.nombre.setText(estados.getNombre());
        holder.tipo.setText(estados.getTipo());
        holder.comentario.setText(estados.getComentario());
        if(estados.getEstado().equals("1")){
            holder.estado.setText("Aprobado");
            holder.content.setBackgroundColor(Color.parseColor("#7EB639"));
        }else if(estados.getEstado().equals("2")){
            holder.estado.setText("En proceso");
            holder.content.setBackgroundColor(Color.parseColor("#FF9100"));
        }else if(estados.getEstado().equals("3")){
            holder.estado.setText("Rechazado");
            holder.content.setBackgroundColor(Color.parseColor("#ff1744"));

        }
    }

    @Override
    public int getItemCount() {
        return listadoPreguntas.size();
    }


    public class AdaptadorViewHolder extends RecyclerView.ViewHolder {
        TextView nombre, tipo, comentario, estado;
        RelativeLayout content;

         public AdaptadorViewHolder(View itemView) {
            super(itemView);
            nombre = itemView.findViewById(R.id.Titulo);
            tipo = itemView.findViewById(R.id.TipoE);
            comentario = itemView.findViewById(R.id.comentarioE);
            estado = itemView.findViewById(R.id.estado);
            content = itemView.findViewById(R.id.content1);
        }
    }
}
