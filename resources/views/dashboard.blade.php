<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <div>Bem vindo, {{ Auth::user()->name }}!</div>
        </h2>
    </x-slot>

    <style>
        .carousel{
        /*    max-width: 70%; */
        
            width: 1200px;
           
        }
    </style>

   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://he.ufp.pt/assets/imgs/web-share.png" class="carousel"  alt="First slide"  >
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://he.ufp.pt/assets/imgs/sobre.jpg" class="carousel" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://he.ufp.pt/assets/imgs/about/valores/768x420_valores.jpg" class="carousel"  alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-black">
                    //Pequena apresentação programa Estágios/EC
                    <br>
                    //EX
                    <br>
                    Bem vindo a plataforma de gestão de informação estratégica relativa aos estágios e ensinos clínicos realizados no
                    HE-UFP.
                    <br>
                    Esta plataforma foi desenvolvida no ambito de prestar auxilio aos docentes do HE-UFP para a organização, onde numa só plataforma seja possivel gerir os
                    diversos alunos que estejam a participar num estágio da área de saúde, as suas presenças, a capacidade de agendar reuniões com os docentes, tudo de forma
                    a facilitar os processos envolvidos.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
