package com.simuegel.simuguide.Cliente;

public class VerHistorial {
    private int id,No_Preguntas,Resultado;
    private String Hora_Inicio,Hora_Final,Subarea,Area,Examen;

    /*public VerHistorial(int id,int no_preguntas, int resultado, String hora_inicio, String hora_final, String subarea, String area, String usuario, String examen){
        this.id = id;
        No_Preguntas = no_preguntas;
        Resultado = resultado;
        Hora_Inicio = hora_inicio;
        Hora_Final = hora_final;
        Subarea = subarea;
        Area = area;
        Usuario = usuario;
        Examen = examen;
    } */

    public VerHistorial(int no_preguntas, int resultado, String hora_inicio, String hora_funal, String subarea, String area, String examen) {
        this.id = id;
        No_Preguntas = no_preguntas;
        Resultado = resultado;
        Hora_Inicio = hora_inicio;
        Hora_Final = hora_funal;
        Subarea = subarea;
        Area = area;
        Examen = examen;
    }

    public int getId() {
        return id;
    }

    public int getNo_Preguntas() {
        return No_Preguntas;
    }

    public int getResultado() {
        return Resultado;
    }

    public String getHora_Inicio() {
        return Hora_Inicio;
    }

    public String getHora_Final() {
        return Hora_Final;
    }

    public String getSubarea() {
        return Subarea;
    }

    public String getArea() {
        return Area;
    }

    public String getExamen() {
        return Examen;
    }
}
