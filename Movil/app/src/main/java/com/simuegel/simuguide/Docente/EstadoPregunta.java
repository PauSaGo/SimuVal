package com.simuegel.simuguide.Docente;

public class EstadoPregunta {
    private String nombre, tipo, comentario, estado;

    public EstadoPregunta(String nombre, String tipo, String comentario, String estado) {
        this.nombre = nombre;
        this.tipo = tipo;
        this.comentario = comentario;
        this.estado = estado;
    }

    public String getNombre() {
        return nombre;
    }

    public String getTipo() {
        return tipo;
    }

    public String getComentario() {
        return comentario;
    }

    public String getEstado() {
        return estado;
    }
}
