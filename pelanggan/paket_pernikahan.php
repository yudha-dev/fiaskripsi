<!-- site__body -->
<div class="block-header block-header--has-breadcrumb block-header--has-title">
    <div class="container">
        <div class="block-header__body">
            <h1 class="block-header__title">Paket Pernikahan</h1>
        </div>
    </div>
</div>
<div class="block-split block-split--has-sidebar">
    <div class="container">
        <div class="block-split__row row no-gutters">
            <div class="block-split__item block-split__item-sidebar col-auto">
                <div class="sidebar sidebar--offcanvas--mobile">
                    <div class="sidebar__backdrop"></div>
                    <div class="sidebar__body">
                        <div class="sidebar__header">
                            <div class="sidebar__title">Filters</div>
                            <button class="sidebar__close" type="button">Filter</button>
                        </div>
                        <div class="sidebar__content">
                            <div class="widget widget-filters widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                                <div class="widget__header widget-filters__header">
                                    <h4>Filters</h4>
                                </div>
                                <div class="widget-filters__list">
                                    <div class="widget-filters__item">
                                        <div class="filter filter--opened" data-collapse-item><button type="button" class="filter__title" data-collapse-trigger>Price <span class="filter__arrow"><svg xmlns="http://www.w3.org/2000/svg" width="12px" height="7px">
                                                        <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" /></svg></span></button>
                                            <div class="filter__body" data-collapse-content>
                                                <div class="filter__container">
                                                    <div class="filter-price" data-min="500" data-max="1500" data-from="590" data-to="1000">
                                                        <div class="filter-price__slider"></div>
                                                        <div class="filter-price__title-button">
                                                            <div class="filter-price__title">$<span class="filter-price__min-value"></span> – $<span class="filter-price__max-value"></span></div><button type="button" class="btn btn-xs btn-secondary filter-price__button">Filter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-filters__actions d-flex"><button class="btn btn-primary btn-sm">Filter</button> <button class="btn btn-secondary btn-sm">Reset</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-split__item block-split__item-content col-auto">
                <div class="block">
                    <div class="products-view">
                        <div class="products-view__options view-options view-options--offcanvas--mobile">
                            <div class="view-options__body">
                                <button type="button" class="view-options__filters-button filters-button">
                                    <span class="filters-button__icon">
                                    </span><span class="filters-button__title">Filters</span> <span class="filters-button__counter">3</span></button>
                                <div class="view-options__layout layout-switcher">
                                    <div class="layout-switcher__list">
                                        <button type="button" class="layout-switcher__button layout-switcher__button--active" data-layout="grid" data-with-features="false"><span class="fas fa-th-large"></span>
                                        </button>
                                        <button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="true">
                                            <span class="fas fa-pause"></span>
                                        </button>
                                        <button type="button" class="layout-switcher__button" data-layout="list" data-with-features="false">
                                            <span class="fas fa-bars"></span>
                                        </button>
                                        <button type="button" class="layout-switcher__button" data-layout="table" data-with-features="false">
                                            <span class="fas fa-align-justify"></span>
                                        </button></div>
                                </div>
                                <div class="view-options__legend">Showing 6 of 98 </div>
                                <div class="view-options__spring"></div>
                                <div class="view-options__select">
                                    <label for="view-option-sort">Sort:</label>
                                    <select id="view-option-sort" class="form-control form-control-sm" name="">
                                        <option value="">Price</option>
                                    </select>
                                </div>
                                <div class="view-options__select">
                                    <label for="view-option-limit">Show:</label>
                                    <select id="view-option-limit" class="form-control form-control-sm" name="">
                                        <option value="">16</option>
                                    </select>
                                </div>
                            </div>
                            <div class="view-options__body view-options__body--filters">
                                <div class="view-options__label">List Paket Pernikahan</div>
                                <div class="applied-filters">
                                </div>
                            </div>
                        </div>
                        <div class="products-view__list products-list products-list--grid--3" data-layout="list" data-with-features="false">
                            <div class="products-list__content">
                                <?php
                                include '../koneksi/koneksi.php';
                                //query join paket dan semua kategori dan vendor
                                $data = mysqli_query($koneksi, "SELECT paket_pernikahan.id_pp,paket_pernikahan.id_jasa,paket_pernikahan.kode_paket,paket_pernikahan.nama_paket,jasa.nama_jasa,SUM(jasa.harga) AS total,jasa.keterangan FROM paket_pernikahan INNER JOIN jasa ON paket_pernikahan.id_jasa = jasa.id_jasa GROUP BY kode_paket");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <div class="products-list__item">
                                        <div class="product-card">
                                            <div class="product-card__info">
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="index.php?page=rincian_paket&id=<?= $d['kode_paket'] ?>"><?= $d['nama_paket'] ?></a>
                                                    </div>
                                                </div>
                                                <div class="product-card__features">
                                                    <ul>
                                                        <?php include('detail_paket.php'); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php
                                        if (empty($_SESSION['id_pelanggan'])) {
                                            echo '<div class="product-card__footer">
                                            <div class="product-card__prices">
                                                <div class="product-card__price product-card__price--current">Login untuk melihat harga</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                        } else {

                                            echo '<div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">Rp. ' . number_format($d['total'], 0, ".", ".") . '</div>
                                                </div>
                                                <a href="index.php?page=rincian_paket&id=' . $d['kode_paket'] . '" class="btn btn-primary btn-xs">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>';
                                        }
                                    } ?>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="products-view__pagination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link--with-arrow" href="#" aria-label="Previous">
                                            <span class="page-link__arrow page-link__arrow--left fas fa-angle-left" aria-hidden="true"></span></a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page"><span class="page-link">2 <span class="sr-only">(current)</span></span></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item page-item--dots">
                                        <div class="pagination__dots"></div>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">9</a></li>
                                    <li class="page-item"><a class="page-link page-link--with-arrow fas fa-angle-right" href="#" aria-label="Next"><span class="page-link__arrow page-link__arrow--right" aria-hidden="true"></span></a></li>
                                </ul>
                            </nav>
                            <div class="products-view__pagination-legend">Showing 6 of 98 products</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
</div>