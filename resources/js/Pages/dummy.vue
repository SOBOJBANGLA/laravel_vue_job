<template>
    <Header />
    <section class="bg-half-170 d-table w-100" style="background: url('images/hero/bg2.jpg');">
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Job Lists</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 mt-4">
                    <div class="features-absolute">
                        <div class="d-md-flex justify-content-between align-items-center bg-white shadow rounded p-4">
                            <form @submit.prevent="fetchJobs" class="card-body text-start">
                                <div class="registration-form text-dark text-start">
                                    <div class="row g-lg-0">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Search :</label>
                                                <div class="filter-search-form position-relative filter-border">
                                                    <i data-feather="search" class="fea icon-20 icons"></i>
                                                    <input v-model="state.search" type="text" id="job-keyword" class="form-control filter-input-box bg-light border-0" placeholder="Search your keywords">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Location:</label>
                                                <div class="filter-search-form position-relative filter-border">
                                                    <i data-feather="map-pin" class="fea icon-20 icons"></i>
                                                    <select v-model="state.location" class="form-select" id="choices-location">
                                                        <option value="">All Locations</option>
                                                        <option v-for="loc in locations" :key="loc.id" :value="loc.id">{{ loc.location_name }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Type :</label>
                                                <div class="filter-search-form relative filter-border">
                                                    <i data-feather="briefcase" class="fea icon-20 icons"></i>
                                                    <select v-model="state.jobtype" class="form-select" id="choices-type">
                                                        <option value="">All Types</option>
                                                        <option v-for="type in jobtypes" :key="type.id" :value="type.id">{{ type.jobtype_name }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Category :</label>
                                                <div class="filter-search-form relative filter-border">
                                                    <i data-feather="layers" class="fea icon-20 icons"></i>
                                                    <select v-model="state.category" class="form-select" id="choices-category">
                                                        <option value="">All Categories</option>
                                                        <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.category_name }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Jobs per page:</label>
                                                <div class="filter-search-form relative filter-border">
                                                    <i data-feather="list" class="fea icon-20 icons"></i>
                                                    <select v-model="state.perPage" class="form-select" id="choices-per-page">
                                                        <option value="10">10</option>
                                                        <option value="20">20</option>
                                                        <option value="30">30</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-100">
            <div class="row g-4">
                <div v-for="job in filteredJobs" :key="job.id" class="col-12">
                    <div class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                        <div class="d-flex align-items-center w-310px">
                            <img src="images/company/circle-logo.png" class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                            <div class="ms-3">
                                <a href="job-detail-one.html" class="h5 title text-dark">{{job.title}}</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                            <span class="badge bg-soft-primary rounded-pill">{{JobtypeName(job.jobtype_id)}}</span>
                            <span class="text-muted d-flex align-items-center fw-medium mt-md-2">{{CategoryName(job.category_id)}}</span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                            <span class="text-muted d-flex align-items-center"><i data-feather="map-pin" class="fea icon-sm me-1 align-middle"></i>{{LocationName(job.location_id)}}</span>
                            <span class="d-flex fw-medium mt-md-2">{{job.salary}} TK/ Month</span>
                        </div>

                        <div class="mt-3 mt-md-0">
                            <a href="" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                            <Link :href="route('jobDetail', { id: job.id })" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <Footer />
</template>

<script setup>
import { reactive, computed } from 'vue';
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const { jobs, locations, categories, jobtypes } = usePage().props;

const state = reactive({
  search: '',
  location: '',
  jobtype: '',
  category: '',
  perPage: 10, // default number of jobs per page
});

const filteredJobs = computed(() => {
  const filtered = jobs.filter(job => {
    const matchesSearch = job.title.toLowerCase().includes(state.search.toLowerCase());
    const matchesLocation = state.location ? job.location_id == state.location : true;
    const matchesJobtype = state.jobtype ? job.jobtype_id == state.jobtype : true;
    const matchesCategory = state.category ? job.category_id == state.category : true;
    return matchesSearch && matchesLocation && matchesJobtype && matchesCategory;
  });
  return filtered.slice(0, state.perPage);
});

const JobtypeName = (id) => {
  const jobtype = jobtypes.find(type => type.id === id);
  return jobtype ? jobtype.jobtype_name : 'Unknown Jobtype';
};

const CategoryName = (id) => {
  const category = categories.find(cat => cat.id === id);
  return category ? category.category_name : 'Unknown Category';
};

const LocationName = (id) => {
  const location = locations.find(loc => loc.id === id);
  return location ? location.location_name : 'Unknown Location';
};

</script>

<style scoped></style>
