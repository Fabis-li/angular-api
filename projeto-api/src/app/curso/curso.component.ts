import { Component, OnInit } from '@angular/core';
import { Curso } from './curso';
import { CursoService } from './curso.service';

@Component({
  selector: 'app-curso',
  templateUrl: './curso.component.html',
  styleUrls: ['./curso.component.css']
})
export class CursoComponent implements OnInit {

  vetor:Curso[] = [];

  //Objeto da classe curso
  curso:Curso = new Curso();

  //Construtor
  constructor(private curso_servico:CursoService) { }

  //Inicializador
  ngOnInit(): void {
    this.selecao();
  }

  //Cadastro
  cadastro(){
    this.curso_servico.cadastrarCurso(this.curso).subscribe(
      (res:Curso[]) => {

        //Adicionando dados ao vetor
        this.vetor = res;

        //Limpando os atributos
        this.curso.nomeCurso = '';
        this.curso.valorCurso = 0;

        //Atualizar Seleção
        this.selecao();

      }
    )
  }

  //Seleção
  selecao(){
    this.curso_servico.obterCursos().subscribe(
      (res:Curso[]) => {
        this.vetor = res;
      }
    );
  
  }

  //Alterar
  alterar(){
   this.curso_servico.atualizarCurso(this.curso).subscribe(
      (res:Curso[]) => {

        //Atualiza vetor
        this.vetor = res;

        //Limpando os atributos
        this.curso.nomeCurso = '';
        this.curso.valorCurso = 0;

        //Atualizar Listagem
        this.selecao();
      }
   );
  }

  //Excluir
  remover(){
   this.curso_servico.removerCurso(this.curso).subscribe(//Executa o método
      (res:Curso[]) => {//Retorno do método
        this.vetor = res;//Atualiza o vetor

        //Limpando os atributos
        this.curso.nomeCurso = '';
        this.curso.valorCurso = 0;

        this.selecao();//Atualizar Listagem
      }
   );
  }

  //Selecionar curso  especifico
  selecionarCurso(c:Curso){
    this.curso.idCurso = c.idCurso;
    this.curso.nomeCurso = c.nomeCurso;
    this.curso.valorCurso = c.valorCurso;
  }
}
