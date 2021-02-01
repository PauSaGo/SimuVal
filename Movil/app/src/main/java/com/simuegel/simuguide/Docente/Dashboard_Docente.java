package com.simuegel.simuguide.Docente;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;

import android.os.Bundle;
import android.view.MenuItem;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.simuegel.simuguide.Cliente.Cliente_Fragments.Menu_resultados;
import com.simuegel.simuguide.Docente.Docente_Fragments.Menu_EstadoPreguntas;
import com.simuegel.simuguide.Docente.Docente_Fragments.Menu_HistorialPreguntas;
import com.simuegel.simuguide.Docente.Docente_Fragments.Menu_perfil;
import com.simuegel.simuguide.R;

public class Dashboard_Docente extends AppCompatActivity {
    private BottomNavigationView Navigation;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.dashboard__docente);

        final String cuenta = getIntent().getStringExtra("no_cuenta_docente");
        final String cuentasinguardar = getIntent().getStringExtra("no_cuenta_docent");

        //Guardamos las cuenta del usuario
        final Bundle bundle = new Bundle();
        bundle.putString("no_cuenta_docente",cuenta);
        bundle.putString("no_cuenta_docent",cuentasinguardar);

        Fragment f = new Menu_EstadoPreguntas();
        f.setArguments(bundle);
        getSupportFragmentManager().beginTransaction().replace(R.id.Docente, f).commit();


        init();

        Navigation.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
                Fragment fragment = null;
                switch (menuItem.getItemId()){
                    case R.id.menu_estados:
                        fragment = new Menu_EstadoPreguntas();
                        fragment.setArguments(bundle);
                        break;
                    case R.id.menu_historial_pregunta:
                        fragment = new Menu_HistorialPreguntas();
                        fragment.setArguments(bundle);
                        break;

                    case R.id.menu_perfil:
                        fragment = new Menu_perfil();
                        fragment.setArguments(bundle);
                        break;
                }
                getSupportFragmentManager().beginTransaction().replace(R.id.Docente,fragment,null).commit();
                return true;
            }
        });

    }

    private void init() {
        this.Navigation = findViewById(R.id.bottomBarDocente);
    }
}