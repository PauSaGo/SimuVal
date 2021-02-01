package com.simuegel.simuguide.Academico;

import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.MenuItem;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.simuegel.simuguide.Academico.Academico_Fragments.Menu_lista;
import com.simuegel.simuguide.Academico.Academico_Fragments.Menu_perfil;
import com.simuegel.simuguide.Academico.Academico_Fragments.Menu_revisar;
import com.simuegel.simuguide.R;

public class Dashboard_Academico extends AppCompatActivity {
    private BottomNavigationView Navigation;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.dashboard_academico);

        final String cuenta = getIntent().getStringExtra("no_cuenta_academico");
        final String cuentasinguardar = getIntent().getStringExtra("no_cuenta_academic");

        final Bundle bundle = new Bundle();
        bundle.putString("no_cuenta_academico",cuenta);
        bundle.putString("no_cuenta_academic",cuentasinguardar);

        getSupportFragmentManager().beginTransaction().replace(R.id.Academico,new Menu_lista()).commit();

        init();

        Navigation.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(MenuItem menuItem) {
              Fragment fragment = null;
              switch (menuItem.getItemId()){
                  case R.id.menu_revisar:
                      fragment = new Menu_revisar();
                      fragment.setArguments(bundle);
                      break;
                  case R.id.menu_lista:
                      fragment = new Menu_lista();
                      fragment.setArguments(bundle);
                      break;
                  case R.id.menu_perfil:
                      fragment = new Menu_perfil();
                      fragment.setArguments(bundle);
              }
              getSupportFragmentManager().beginTransaction().replace(R.id.Academico,fragment).commit();
                return true;
            }
        });
    }

    private void init() {
        this.Navigation = findViewById(R.id.bottomBarAcedemico);
    }
}
