package com.simuegel.simuguide.Academico.Adaptador;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import androidx.recyclerview.widget.RecyclerView;
import com.simuegel.simuguide.Academico.ListadoDocentes;
import com.simuegel.simuguide.R;

import java.util.List;

public class AdaptadorListado extends RecyclerView.Adapter<AdaptadorListado.DocenteViewHolder> {
    private Context mCtx;
    private List<ListadoDocentes> listadoDocentes;

    public AdaptadorListado(Context mCtx, List<ListadoDocentes> listadoDocentes){
        this.mCtx = mCtx;
        this.listadoDocentes = listadoDocentes;
    }

    @Override
    public DocenteViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.contenedor_listado_docentes, null, false);
        return new DocenteViewHolder(view);
    }

    @Override
    public void onBindViewHolder(DocenteViewHolder holder, int position) {
        ListadoDocentes docentes = listadoDocentes.get(position);

        holder.nombres.setText("Nombre: "+ docentes.getNombres());
        holder.carreras.setText("Carrera: "+ docentes.getCarrera());
        holder.email.setText("Email: "+ docentes.getEmail());
        holder.cuenta.setText("Cuenta:" + docentes.getCuenta());

    }

    @Override
    public int getItemCount() {
        return listadoDocentes.size();
    }

    public class DocenteViewHolder extends RecyclerView.ViewHolder{
        TextView nombres,carreras,email,cuenta;

        public DocenteViewHolder(View itemview){
            super(itemview);
            /*nombres = itemview.findViewById(R.id.nombre);
            carreras = itemview.findViewById(R.id.carrera);
            email = itemview.findViewById(R.id.email);
            cuenta = itemview.findViewById(R.id.cuentas);*/
            nombres = itemview.findViewById(R.id.nombre);
            carreras = itemview.findViewById(R.id.carrera);
            email = itemview.findViewById(R.id.email);
            cuenta = itemview.findViewById(R.id.cuentas);

        }
    }
}
