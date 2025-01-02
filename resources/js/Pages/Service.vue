<template>
    <div class="container-xxl pt-7 pb-5">
        <div class="mt-lg-5 mt-4">
            <div v-if="service == 'financial-planning-adults'">
                <FinancialPlanningAdults />
            </div>
            <div v-else-if="service == 'financial-planning-children'">
                <FinancialPlanningChildren />
            </div>
            <div v-else-if="service == 'insurance-portfolio-review'">
                <InsurancePortfolioReview />
            </div>
            <div v-else-if="service == 'savings-and-investment-plans'">
                <SavingsAndInvestmentPlans />
            </div>
            <div v-else-if="service == 'retirement-planning'">
                <RetirementPlanning />
            </div>
            <div v-else-if="service == 'loan-advisory'">
                <LoanAdvisory />
            </div>
            <div v-else-if="service == 'investment-advisory'">
                <InvestmentAdvisory />
            </div>
            <div v-else-if="service == 'general-insurance'">
                <GeneralInsurance />
            </div>
            <div v-else-if="service == 'estate-planning'">
                <EstatePlanning />
            </div>
            <div v-else-if="service == 'business-continuity'">
                <BusinessContinuity />
            </div>
        </div>
    </div>
    <!-- # QUOTE SECTION -->
    <div class="container-fluid fa-2024-bg-landing-quote">
        <div class="container-xxl py-7">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <p class="fa-2024-services-quote">We would <span>love</span> to hear from you</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 d-flex flex-column">
                    <p class="fa-2024-services-quote-alt">Share with friends</p>
                    <div class="d-flex flex-row justify-content-center align-items-center" style="gap: 1.5rem !important">
                        <a class="finark-default-link" href="https://www.facebook.com/FinancialArk" target="_blank">
                            <FontAwesomeIcon icon="fa-brands fa-square-facebook" class="fa-2024-services-social-icon" />
                        </a>
                        <a class="finark-default-link text-white" href="https://www.instagram.com/finark.advisory/" target="_blank">
                            <FontAwesomeIcon icon="fa-brands fa-square-instagram" class="fa-2024-services-social-icon" />
                        </a>
                        <a class="finark-default-link text-white" href="https://wa.me/6591813260" target="_blank">
                            <FontAwesomeIcon icon="fa-solid fa-envelope" class="fa-2024-services-social-icon" />
                        </a>
                        <a class="finark-default-link text-white" href="https://www.youtube.com/@FinancialArk" target="_blank">
                            <FontAwesomeIcon icon="fa-brands fa-youtube" class="fa-2024-services-social-icon" />
                        </a>
                        <a class="finark-default-link" href="https://www.linkedin.com/company/finarkgroup/" target="_blank">
                            <FontAwesomeIcon icon="fa-brands fa-linkedin" class="fa-2024-services-social-icon" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <AppointmentModal :minDate="minDate" :page="service" />
</template>

<script setup>
    import FinancialPlanningAdults from '@pages/Services/FinancialPlanningAdults.vue';
    import FinancialPlanningChildren from '@pages/Services/FinancialPlanningChildren.vue';
    import InsurancePortfolioReview from '@pages/Services/InsurancePortfolioReview.vue';
    import SavingsAndInvestmentPlans from '@pages/Services/SavingsAndInvestmentPlans.vue';
    import RetirementPlanning from '@pages/Services/RetirementPlanning.vue';
    import LoanAdvisory from '@pages/Services/LoanAdvisory.vue';
    import InvestmentAdvisory from '@pages/Services/InvestmentAdvisory.vue';
    import GeneralInsurance from '@pages/Services/GeneralInsurance.vue';
    import EstatePlanning from '@pages/Services/EstatePlanning.vue';
    import BusinessContinuity from '@pages/Services/BusinessContinuity.vue';
      
    import AppointmentModal from '@shared/Components/AppointmentModal.vue';
</script>
<script>
    // import ServicesLayout from '@shared/Layouts/Services.vue';

    export default {
        // layout: ServicesLayout,
        props: {
            service: {
                type: String,
                required: true
            },
            minDate: {
                type: String,
                required: true
            }
        }
    }
</script>