<template>
    <div class="container-xxl pt-7 pb-5">
        <div class="mt-lg-5 mt-4">
            <div v-if="page == 'financial-planning-adults'">
                <FinancialPlanningAdults />
            </div>
            <div v-else-if="page == 'financial-planning-children'">
                <FinancialPlanningChildren />
            </div>
            <div v-else-if="page == 'insurance-portfolio-review'">
                <InsurancePortfolioReview />
            </div>
            <div v-else-if="page == 'savings-and-investment-plans'">
                <SavingsAndInvestmentPlans />
            </div>
            <div v-else-if="page == 'retirement-planning'">
                <RetirementPlanning />
            </div>
            <div v-else-if="page == 'loan-advisory'">
                <LoanAdvisory />
            </div>
            <div v-else-if="page == 'investment-advisory'">
                <InvestmentAdvisory />
            </div>
            <div v-else-if="page == 'general-insurance'">
                <GeneralInsurance />
            </div>
            <div v-else-if="page == 'estate-planning'">
                <EstatePlanning />
            </div>
            <div v-else-if="page == 'business-continuity'">
                <BusinessContinuity />
            </div>
        </div>
    </div>
    <!-- # QUOTE SECTION -->
    <div class="container-fluid fa-2024-bg-landing-quote">
        <div class="container-xxl py-7">
            <div class="d-flex flex-row justify-content-between">
                <p class="fa-2024-services-quote">We would <span>love</span> to hear from you</p>
                <div class="d-flex flex-column">
                    <p class="fa-2024-services-quote-alt">Share with friends</p>
                    <div class="d-flex flex-row align-items-center" style="gap: 1.5rem !important">
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
    <AppointmentModal :minDate="this.$page.props.minDate" :page="this.$page.props.page" />
</template>

<script setup>
    import FinancialPlanningAdults from './../Pages/Services/FinancialPlanningAdults.vue';
    import FinancialPlanningChildren from './../Pages/Services/FinancialPlanningChildren.vue';
    import InsurancePortfolioReview from './../Pages/Services/InsurancePortfolioReview.vue';
    import SavingsAndInvestmentPlans from './../Pages/Services/SavingsAndInvestmentPlans.vue';
    import RetirementPlanning from './../Pages/Services/RetirementPlanning.vue';
    import LoanAdvisory from './../Pages/Services/LoanAdvisory.vue';
    import InvestmentAdvisory from './../Pages/Services/InvestmentAdvisory.vue';
    import GeneralInsurance from './../Pages/Services/GeneralInsurance.vue';
    import EstatePlanning from './../Pages/Services/EstatePlanning.vue';
    import BusinessContinuity from './../Pages/Services/BusinessContinuity.vue';
      
      import AppointmentModal from './../Shared/Components/AppointmentModal.vue';
</script>
<script>
    // import ServicesLayout from './../Shared/Layouts/Services';

    export default {
        // layout: ServicesLayout,
        props: {
            page: String
        }
    }
</script>