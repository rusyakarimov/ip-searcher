<?php require_once 'inc/header.php'; ?>
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Сервис поиска информации по IP</h1>
                <p class="lead text-muted">
                    Данный сервис поможет вам узнать много полезной информации!
                </p>
                <p class="lead text-muted">
                    Нужно лишь ввести IP-адрес!
                </p>
            </div>
        </div>
    </section>

    <div class="container">
        <br />
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form class="card card-sm" action="getip.php" method="post">
                    <div class="card-body row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-search h4 text-body"></i>
                        </div>
                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Введите IP" name="ip" required>
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button class="btn btn-lg btn-success" type="submit">Искать</button>
                        </div>
                        <!--end of col-->
                    </div>
                </form>
            </div>
            <!--end of col-->
        </div>
    </div>

</main>
<?php require_once 'inc/footer.php'; ?>
