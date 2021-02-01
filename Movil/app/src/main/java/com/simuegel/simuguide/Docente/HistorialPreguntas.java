package com.simuegel.simuguide.Docente;

public class HistorialPreguntas {
    private String nombre, tipo, registro;

    public HistorialPreguntas(String nombre, String tipo, String registro) {
        this.nombre = nombre;
        this.tipo = tipo;
        this.registro = registro;
    }

    public String getNombre() {
        return nombre;
    }

    public String getTipo() {
        return tipo;
    }

    public String getRegistro() {
        return registro;
    }
}
