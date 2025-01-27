<template>
    <Header />
   
    <!-- Start -->
    <section class="bg-half d-table w-100 bg-light">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-8 col-md-6 col-12">

                        <div class="d-lg-flex align-items-center p-4 rounded shadow bg-white mb-4">
                         
                            <div class="ms-lg-3 mt-3 mt-lg-0">
                                <h4>{{ job.title }}</h4>

                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-flex align-items-center text-muted me-2"><i data-feather="layout" class="fea icon-sm text-primary me-1"></i>{{CompanyName(job.company_id)}}</li>
                                    <li class="d-inline-flex align-items-center text-muted"> {{LocationName(job.location_id)}}</li>
                                </ul>
                            </div>
                        </div>

                        <h5>Job Description: </h5>
                        <p class="text-muted">{{job.description}}</p>
                       
                        
                        <h5 class="mt-4">Responsibilities and Duties: </h5>
                        <p class="text-muted">{{job.responsibility}}</p>
                       

                        <h5 class="mt-4">Required Experience, Skills and Qualifications: </h5>
                        <p class="text-muted">{{job.qualifications}}</p>

                        <div v-if="user" class="mt-4">
                            
                            <button v-if="application" type="button" class="btn btn-warning">Already Applied</button>
                             <Link v-else :href="route('applicant.create', job.id)" class="btn btn-outline-primary"> Apply Now <i class="mdi mdi-send"></i> </Link>
                           
                        </div>

                        <div v-else>
                        <Link :href="route('candidate_login_form')" class="btn btn-info">Login First</Link>
                         </div>
                       
                    </div>

                    
                </div>
            </div>

           
        </section>
    <Footer />
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import { Link, usePage } from '@inertiajs/vue3';
import Modal from '../Components/Modal.vue'
import { computed, ref } from 'vue';

const{ job,locations,categories,jobtypes,companies,application,user} = usePage().props

const JobtypeName = (id) => {
    const jobtype = jobtypes.find(type => type.id === id);
    return jobtype ? jobtype.jobtype_name : 'Unknown Jobtype';
};

const CompanyName = (id) => {
        const company = companies.find(com => com.id === id);
        return company ? company.name : 'Unknown Company';
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