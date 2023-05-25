
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

<div class="carousel" id="carouselExampleControls">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://he.ufp.pt/assets/imgs/web-share.png" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://he.ufp.pt/assets/imgs/sobre.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://he.ufp.pt/assets/imgs/about/valores/768x420_valores.jpg" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://www.ufp.pt/app/uploads/2020/03/pasop01.jpg" alt="Fourth slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://he.ufp.pt/storage/images/services/7_cirurgia-geral_1536056441.jpg" alt="Fifth slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://he.ufp.pt/storage/images/posts/pt/post_271/271_bem-vindo_62a0c081599d8.jpg" alt="Sixth slide">
        </div>
    </div>

    <!-- Carousel controls -->
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
                <!-- Pequena apresentação programa Estágios/EC -->
                <p class="text-xl font-semibold mb-6">Plataforma de gestão de informação estratégica relativa aos estágios e ensinos clínicos realizados no HE-UFP</p>
                <p>Esta plataforma foi desenvolvida no âmbito de prestar auxílio aos docentes do HE-UFP para a organização, onde numa só plataforma seja possível gerir os diversos alunos que estejam a participar num estágio da área de saúde, as suas presenças, a capacidade de agendar reuniões com os docentes, tudo de forma a facilitar os processos envolvidos.</p>
                <br>
                <br>
                <p class="text-lg font-semibold mb-4">CONTACTOS DO SERVIÇO</p>
                <p>Centro de Ensino graduado, de Formação contínua e de Educação para a Saúde</p>
                <p>Avenida Fernando Pessoa, 150 4420-096 Gondomar, Portugal (GPS: 41.14313,-8.544427)</p>
                <p>Telefone: +351 222 455 455</p>
                <p>E-mail: cefes.he@ufp.edu.pt</p>
                <p>Presidente: Prof. Doutor José Calheiros</p>
                <p>Coordenação Administrativa-Funcional: Dr.ª Carla Sousa</p>
            </div>
        </div>
    </div>
</div>


<style>
    .carousel {
        position: relative;
        width: 100%;
        height: 700px;
        overflow: hidden;
    }

    .carousel-inner {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .carousel-item {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: none;
        transition: opacity 0.6s ease-in-out;
    }

    .carousel-item.active {
        display: block;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-control-prev,
    .carousel-control-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgba(0, 123, 255, 0.8);
        color: #fff;
        text-align: center;
        font-size: 18px;
        line-height: 40px;
        cursor: pointer;
    }

    .carousel-control-prev {
        left: 20px;
    }

    .carousel-control-next {
        right: 20px;
    }
</style>
