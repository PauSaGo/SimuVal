package com.simuegel.simuguide.Academico;

public class ListadoDocentes {
    private int id;
    private String Nombres, Carrera, Email, Cuenta;

    public ListadoDocentes(int id, String nombres, String carrera, String email, String cuenta) {
        this.id = id;
        Nombres = nombres;
        Carrera = carrera;
        Email = email;
        Cuenta = cuenta;
    }

    public int getId() {
        return id;
    }

    public String getNombres() {
        return Nombres;
    }
    public String getCarrera() {
        return Carrera;
    }
    public String getEmail() {
        return Email;
    }
    public String getCuenta() {
        return Cuenta;
    }

}
