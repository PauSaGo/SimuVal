package com.simuegel.simuguide.Cliente;

public class VerGraficas {

    private int No_preguntas, Resultado;

    public VerGraficas(int no_preguntas, int resultado) {
        No_preguntas = no_preguntas;
        Resultado = resultado;
    }

    public int getNo_preguntas() {
        return No_preguntas;
    }

    public int getResultado() {
        return Resultado;
    }
}
