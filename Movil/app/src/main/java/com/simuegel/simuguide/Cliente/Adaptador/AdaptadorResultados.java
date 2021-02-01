package com.simuegel.simuguide.Cliente.Adaptador;

import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.github.mikephil.charting.charts.PieChart;
import com.github.mikephil.charting.data.PieData;
import com.github.mikephil.charting.data.PieDataSet;
import com.github.mikephil.charting.data.PieEntry;
import com.github.mikephil.charting.utils.ColorTemplate;
import com.simuegel.simuguide.Cliente.VerGraficas;
import com.simuegel.simuguide.R;

import java.util.ArrayList;
import java.util.List;

public class AdaptadorResultados extends RecyclerView.Adapter<AdaptadorResultados.ClienteHolderView>{
    private Context mCtx;
    private List<VerGraficas> listadoGrafica;

    public AdaptadorResultados(Context mCtx, List<VerGraficas> listadoGrafica) {
        this.mCtx = mCtx;
        this.listadoGrafica = listadoGrafica;
    }

    @Override
    public ClienteHolderView onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.contenedor_resultado, null, false);
        return new ClienteHolderView(view);
    }

    @Override
    public void onBindViewHolder(ClienteHolderView holder, int position) {
        VerGraficas graficas = listadoGrafica.get(position);

        ArrayList<PieEntry> data = new ArrayList<>();
        data.add(new PieEntry(graficas.getNo_preguntas(),"Número total"));
        data.add(new PieEntry(graficas.getResultado(),"Resultados"));

        PieDataSet pieDataSet = new PieDataSet(data,"");
        pieDataSet.setColors(ColorTemplate.MATERIAL_COLORS);
        pieDataSet.setValueTextColor(Color.BLACK);
        pieDataSet.setValueTextSize(16f);
        pieDataSet.setSliceSpace(3f);
        pieDataSet.setSelectionShift(5f);

        PieData pieData = new PieData(pieDataSet);

        holder.resultadoGrafica.setData(pieData);
        holder.resultadoGrafica.getDescription().setEnabled(false);
        holder.resultadoGrafica.setCenterText("Resultados");
        holder.resultadoGrafica.setDrawHoleEnabled(true);
        
        //holder.resultadoGrafica.animate();
    }

    @Override
    public int getItemCount() {
        return listadoGrafica.size();
    }


    public class ClienteHolderView extends RecyclerView.ViewHolder {
        PieChart resultadoGrafica;

        public ClienteHolderView(View itemView) {
            super(itemView);
            resultadoGrafica = itemView.findViewById(R.id.grafica);
        }
    }
}
