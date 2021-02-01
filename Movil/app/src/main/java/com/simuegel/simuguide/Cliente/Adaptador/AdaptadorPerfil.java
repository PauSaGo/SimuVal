package com.simuegel.simuguide.Cliente.Adaptador;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.simuegel.simuguide.Cliente.VerPerfil;
import com.simuegel.simuguide.R;

import java.util.List;

public class AdaptadorPerfil extends RecyclerView.Adapter<AdaptadorPerfil.ClienteViewHolder> {
    private Context mCtx;
    private List<VerPerfil> perfilList;

    public AdaptadorPerfil(Context mCtx, List<VerPerfil> perfilList) {
        this.mCtx = mCtx;
        this.perfilList = perfilList;
    }

    @Override
    public ClienteViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.contenedor_perfil,null,false);
        return new ClienteViewHolder(view);
    }

    @Override
    public void onBindViewHolder(ClienteViewHolder holder, int position) {
        VerPerfil perfil = perfilList.get(position);

        holder.nombre.setText(perfil.getNombre()+" " + perfil.getApellido());
        holder.facultad.setText(perfil.getFacultad());
        holder.carrera.setText(perfil.getCarrera());
        holder.semestre.setText(perfil.getSemestre());
        holder.cuenta.setText(perfil.getNo_cuenta());
        holder.correo.setText(perfil.getCorreo());

    }

    @Override
    public int getItemCount() {
        return perfilList.size();
    }

    public class ClienteViewHolder extends RecyclerView.ViewHolder {
        TextView nombre, facultad, carrera, semestre, cuenta, correo;
        public ClienteViewHolder(View itemView) {
            super(itemView);

            nombre = itemView.findViewById(R.id.name);
            facultad = itemView.findViewById(R.id.facu);
            carrera = itemView.findViewById(R.id.carre);
            semestre = itemView.findViewById(R.id.grado);
            cuenta = itemView.findViewById(R.id.numero);
            correo = itemView.findViewById(R.id.correos);
        }
    }
}
