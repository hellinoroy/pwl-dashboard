<?= $this->include("components/header") ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- id_registrasi 	nama_depan 	nama_tengah 	nama_belakang 	
tanggal_lahir 	tempat_lahir 	jenis_kelamin 	nomor_hp 	email 	
alamat 	kota 	provinsi 	negara 	kode_pos 	username 	password 	foto 	komentar  -->

<div class="container">
  <div class="row justify-content-center text-center">
    <div class="col-5 position-relative chart-container">
      <canvas class="" id="provinsi-chart"></canvas>
    </div>
  </div>
</div>


<div class="row justify-content-between">
  <?php helper('form'); ?>

  <?= form_open("/dashboard", $attributes = ["class" => "text-dark font-weight-bold d-flex flex-row col-5 align-items-center gap-3", "method" => "GET"]); ?>
      <form class="float-end" id="form_search">
        <label for="search">Search:</label>
        <?= form_input(["class" => "form-control", "id" => "search", "placeholder" => "First Name", "name" => "firstName"]); ?>
        <?= form_submit(["class" => "btn btn-success"], $value = "Search") ?>
      </form>
  <?= form_close(); ?>

  <div class="col-5">
    <?= form_open("/export-data", $attributes = ["class" => "d-flex flex-row flex-nowrap"]); ?>
    <?= form_dropdown($name = "export-select", $options = ["excel" => "Excel", "csv" => "CSV", "txt" => "TXT"], $selected = "", $extra = ["class" => "form-select"]); ?>
        <?= form_submit(["class" => "btn btn-success"], $value = "Export") ?>
    <?= form_close() ?>
  </div>

</div>



<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">nama_depan</th>
        <th scope="col">nama_belakang</th>
        <th scope="col">jenis_kelamin</th>
        <th scope="col">provinsi</th>
        <th scope="col">nomor_hp</th>
        <th scope="col">email</th>
        <!-- <th scope="col">foto</th> -->
        <!-- <th scope="col">komentar</th> -->

        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
          <tr>
            <td><?= esc($user['nama_depan']) ?></td>
            <td><?= esc($user['nama_belakang']) ?></td>
            <td><?= esc($user['jenis_kelamin']) ?></td>
            <td><?= esc($provinsi_list[$user['provinsi']]) ?></td>
            <td><?= esc($user['nomor_hp']) ?></td>
            <td><?= esc($user['email']) ?></td>
            <!-- <td><img src="<?= base_url("fotoProfil/".esc($user['foto'])) ?>" class="img-thumbnail" onError="removeElement(this);"></td> -->
            <!-- <td><?= esc($user['komentar']) ?></td> -->
            <td>
              <a href="<?= base_url('profile/' . $user['id_registrasi']) ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-user" ></i></a>
              <a href="<?= base_url('dashboard/edit/' . $user['id_registrasi']) ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pencil" ></i></a>
              <a href="<?= base_url('dashboard/delete/' . $user['id_registrasi']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-solid fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $pager->links('default','bootstrap'); ?>

<script>
  function removeElement(element) {
    element.remove(); 
  }
</script>

<script>
  const chartProvinsi = document.getElementById('provinsi-chart');

  // Fetch data asynchronously
  async function namaProvinsiChartAsync() {
    const res = await fetch("/provinsi");
    const data = await res.json();
    const nama = [];
    const jumlah = [];

    for (const row of data) {
      nama.push(row.nama_provinsi);
      jumlah.push(row.jumlah); 
    }

    return { nama, jumlah };
  }

  // Initialize the chart
  async function initChart() {
    const { nama, jumlah } = await namaProvinsiChartAsync();

    const chart = new Chart(chartProvinsi, {
      type: 'doughnut',
      data: {
        labels: nama,
        datasets: [{
          label: 'Frekuensi',
          data: jumlah,
          borderWidth: 1
        }]
      },
      options: {
        plugins: {
          title: {
            display: true,
            text: "Jumlah Pendaftaran Tiap Provinsi"
          }
        }
      }
    });

    return chart;
  }

  // Update chart data
  async function updateChart(chart) {
    const { nama, jumlah } = await namaProvinsiChartAsync();
    
    chart.data.labels = nama;
    chart.data.datasets[0].data = jumlah;
    chart.update();
  }

  // Initialize chart and set interval to update it every 10 seconds
  async function startChart() {
    const chart = await initChart();
    setInterval(() => updateChart(chart), 10000); // Update chart every 10 seconds
  }

  startChart();
</script>

<?= $this->include("components/footer") ?>