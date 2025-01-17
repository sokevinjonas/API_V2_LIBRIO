@extends('admin.layouts.app')
@section('title', 'Tableau de Bord')
@section('pagetitle')
<h1>Profil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Tableau de Bord</a></li>
          <li class="breadcrumb-item active">Tableau de Bord</li>
          {{-- <li class="breadcrumb-item active">Profil</li> --}}
        </ol>
      </nav>
@endsection
@section('content')
<div class="row">

  <div class="col-lg-12">
    <div class="row">
  
      <!-- Carte des ventes -->
      <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Ventes</h5>
  
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cart"></i>
              </div>
              <div class="ps-3">
                <h6>145</h6>
                <span class="text-success small pt-1 fw-bold">+12%</span>
                <span class="text-muted small pt-2 ps-1">d'augmentation</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Carte des ventes -->
  
      <!-- Carte des revenus -->
      <div class="col-xxl-4 col-md-6">
        <div class="card info-card revenue-card">
          <div class="card-body">
            <h5 class="card-title">Revenus</h5>
  
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-dollar"></i>
              </div>
              <div class="ps-3">
                <h6>3 264 €</h6>
                <span class="text-success small pt-1 fw-bold">+8%</span>
                <span class="text-muted small pt-2 ps-1">d'augmentation</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Carte des revenus -->
  
      <!-- Carte des utilisateurs -->
      <div class="col-xxl-4 col-xl-12">
        <div class="card info-card customers-card">
          <div class="card-body">
            <h5 class="card-title">Utilisateurs</h5>
  
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6>1 244</h6>
                <span class="text-danger small pt-1 fw-bold">-12%</span>
                <span class="text-muted small pt-2 ps-1">de diminution</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Carte des utilisateurs -->
  
      <!-- Rapport -->
     <!-- Rapport -->
<div class="col-12">
  <div class="card">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filtrer</h6>
        </li>
        <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
        <li><a class="dropdown-item" href="#">Ce mois</a></li>
        <li><a class="dropdown-item" href="#">Cette année</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Rapport <span>/ Cette année</span></h5>

      <!-- Graphique en ligne -->
      <div id="reportsChart"></div>

      <script>
        document.addEventListener("DOMContentLoaded", () => {
          new ApexCharts(document.querySelector("#reportsChart"), {
            series: [{
              name: 'Ventes',
              data: [450, 520, 610, 400, 700, 850, 760, 920, 890, 680, 720, 810],
            }, {
              name: 'Revenus',
              data: [200, 350, 450, 300, 500, 600, 580, 700, 650, 480, 540, 610],
            }, {
              name: 'Clients',
              data: [100, 120, 130, 110, 150, 170, 160, 200, 180, 140, 160, 190],
            }],
            chart: {
              height: 350,
              type: 'area',
              toolbar: {
                show: false
              },
            },
            markers: {
              size: 4
            },
            colors: ['#4e73df', '#1cc88a', '#36b9cc'],
            fill: {
              type: "gradient",
              gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.3,
                opacityTo: 0.4,
                stops: [0, 90, 100]
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'smooth',
              width: 2
            },
            xaxis: {
              categories: [
                "Janvier", "Février", "Mars", "Avril", 
                "Mai", "Juin", "Juillet", "Août", 
                "Septembre", "Octobre", "Novembre", "Décembre"
              ],
              labels: {
                style: {
                  fontSize: '12px',
                }
              }
            },
            tooltip: {
              x: {
                formatter: function (value) {
                  return value; // Afficher uniquement le mois
                }
              },
            }
          }).render();
        });
      </script>
      <!-- Fin Graphique en ligne -->

    </div>

  </div>
</div>
<!-- Fin Rapport -->

      <!-- Fin Rapport -->

  
      <!-- Section des alertes -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Alertes</h5>
            <ul>
              <li>5 livres en attente de validation.</li>
              <li>3 utilisateurs inactifs détectés.</li>
              <li>Stock faible sur 2 catégories.</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Fin Section des alertes -->
  
    </div>
  </div>
  

</div>
@endsection
