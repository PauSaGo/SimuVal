package com.simuegel.simuguide.Academico.Adaptador;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.text.SpannableString;
import android.text.Spanned;
import android.text.style.ForegroundColorSpan;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import com.simuegel.simuguide.Academico.Academico_Fragments.Menu_revisar;
import com.simuegel.simuguide.Academico.DetallesReactivo;
import com.simuegel.simuguide.Academico.PreguntasDocentes;
import com.simuegel.simuguide.R;

import java.util.List;

public class AdaptadorPreguntas extends RecyclerView.Adapter<AdaptadorPreguntas.DocenteViewHolder> {
    private Context context;
    private List<PreguntasDocentes> preguntasDocentes;

    public AdaptadorPreguntas(Context context, List<PreguntasDocentes> preguntasDocentes){
        this.context = context;
        this.preguntasDocentes = preguntasDocentes;
    }

    @Override
    public DocenteViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(context);
        View view = inflater.inflate(R.layout.contendor_preguntas, null, false);
       // notifyDataSetChanged();
        return new DocenteViewHolder(view);
    }

    @Override
    public void onBindViewHolder(final DocenteViewHolder holder, int position) {

        final PreguntasDocentes preguntas = preguntasDocentes.get(position);
        final String planteada,tipo,propuesto,area,subarea, cuenta;


        cuenta = preguntas.getCuenta();


        holder.nombre.setText(preguntas.getCorto());
        //holder.comentario.setText(comentario +"\n"+ preguntas.getComentario());
        /*
        if(!preguntas.getComentario().equals("null")){
            holder.comentario.setText(preguntas.getComentario());
        }else{
            holder.comentario.setText("Comentario: \nNo hay comentario");
        }*/
        holder.tipo.setText(preguntas.getTipo());
        holder.propuesto.setText(preguntas.getPropuesto());
        holder.area.setText(preguntas.getArea());
        //holder.subarea.setText(preguntas.getSubarea());
        holder.content.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(context, DetallesReactivo.class);
                i.putExtra("cuenta",preguntas.getCuenta());
                i.putExtra("id",preguntas.getId());
                i.putExtra("nombre",preguntas.getNombre());
                i.putExtra("comentario",preguntas.getComentario());
               // i.putExtra("tipox",preguntas.getTipo());
                i.putExtra("propuesto",preguntas.getPropuesto());
                i.putExtra("area",preguntas.getArea());
                i.putExtra("subarea",preguntas.getSubarea());
                context.startActivity(i);
                notifyDataSetChanged();
            }
        });
    }

    @Override
    public int getItemCount() {
        return preguntasDocentes.size();
    }

    public class DocenteViewHolder extends RecyclerView.ViewHolder{
        TextView id, nombre, comentario, tipo, propuesto, area, subarea;
        RelativeLayout content;

        public DocenteViewHolder(View itemview) {
            super(itemview);
            nombre = itemview.findViewById(R.id.pregunta);
            tipo = itemview.findViewById(R.id.tipo);
            propuesto = itemview.findViewById(R.id.propuesto);
            area = itemview.findViewById(R.id.area);
            content = itemview.findViewById(R.id.content);
        }
    }
}
