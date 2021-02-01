package com.simuegel.simuguide.Cliente;

import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.simuegel.simuguide.Cliente.Cliente_Fragments.Menu_historial;
import com.simuegel.simuguide.Cliente.Cliente_Fragments.Menu_perfil;
import com.simuegel.simuguide.Cliente.Cliente_Fragments.Menu_resultados;
import com.simuegel.simuguide.R;

public class Dashboard_Cliente extends AppCompatActivity {
    private BottomNavigationView Navigation;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.dashboard__cliente);

        final String cuenta = getIntent().getStringExtra("no_cuenta_alumno");
        final String cuentasinguardar = getIntent().getStringExtra("no_cuenta_alumn");

        final Bundle bundle = new Bundle();
        bundle.putString("no_cuenta_alumno",cuenta);
        bundle.putString("no_cuenta_alumn",cuentasinguardar);

        Fragment f = new Menu_resultados();
        f.setArguments(bundle);
        getSupportFragmentManager().beginTransaction().replace(R.id.Cliente,f).commit();

        init();

        Navigation.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(MenuItem menuItem) {
                Fragment fragment = null;
                switch(menuItem.getItemId()){
                    case R.id.menu_historial:
                        fragment = new Menu_historial();
                        fragment.setArguments(bundle);
                        break;
                    case R.id.menu_resultado:
                        fragment = new Menu_resultados();
                        fragment.setArguments(bundle);
                        break;
                    case R.id.menu_perfil:
                        fragment = new Menu_perfil();
                        fragment.setArguments(bundle);
                }
                getSupportFragmentManager().beginTransaction().replace(R.id.Cliente,fragment).commit();
                return true;
            }
        });
    }

    private void init() {
        this.Navigation = findViewById(R.id.bottomBarCliente);
    }
}
