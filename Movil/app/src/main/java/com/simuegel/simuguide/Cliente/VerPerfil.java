package com.simuegel.simuguide.Cliente;

public class VerPerfil {

    private String Nombre,Apellido,Carrera, Facultad, Semestre, No_cuenta, Correo;

    public VerPerfil(String nombre, String apellido, String carrera, String facultad, String semestre, String no_cuenta, String correo) {
        Nombre = nombre;
        Apellido = apellido;
        Carrera = carrera;
        Facultad = facultad;
        Semestre = semestre;
        No_cuenta = no_cuenta;
        Correo = correo;
    }

    public String getNombre() {
        return Nombre;
    }

    public String getApellido() { return Apellido; }

    public String getCarrera() {
        return Carrera;
    }

    public String getFacultad() {
        return Facultad;
    }

    public String getSemestre() {
        return Semestre;
    }

    public String getNo_cuenta() {
        return No_cuenta;
    }

    public String getCorreo() {
        return Correo;
    }
}
