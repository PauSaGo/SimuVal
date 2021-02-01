package com.simuegel.simuguide.Academico;

public class PreguntasDocentes {
    private String id;
    private String Nombre, Comentario, Propuesto, Area, Subarea, Tipo, Cuenta, Corto;

    public PreguntasDocentes(String id, String nombre, String tipo, String comentario, String propuesto, String area, String subarea, String cuenta, String corto) {
        this.id = id;
        Nombre = nombre;
        Tipo = tipo;
        Comentario = comentario;
        Propuesto = propuesto;
        Area = area;
        Subarea = subarea;
        Cuenta = cuenta;
        Corto = corto;
    }

    public String getId() {
        return id;
    }

    public String getNombre() {
        return Nombre;
    }

    public String getTipo() {
        return Tipo;
    }

    public String getComentario() {
        return Comentario;
    }

    public String getPropuesto() {
        return Propuesto;
    }

    public String getArea() {
        return Area;
    }

    public String getSubarea() {
        return Subarea;
    }

    public String getCuenta()  { return Cuenta; }

    public String getCorto() { return  Corto; }
}
