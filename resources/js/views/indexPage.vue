<template>
    <div class="container">
        <Navbar/>
    </div>
    <HomeHeader/>
    <SearchServiceSection/>
    <HowItWork/>
    <Features/>
    <ServiceProduction/>
    <NewJobs/>
    <MawthoqServices/>
    <ServiceExplain/>
    <OrdersStages/>
    <MawthoqPartners/>
    <MawthoqApp/>
    <LayoutFooter/>
</template>
<script>

import Navbar from '../components/partials/LayoutNavBar'
import HomeHeader from '../components/partials/home/HomeHeader.vue'
import SearchServiceSection from '../components/partials/home/SearchServiceSection.vue'
import HowItWork from '../components/partials/home/HowItWork.vue'
import Features from '../components/partials/home/Features.vue'
import ServiceProduction from '../components/partials/home/ServiceProduction.vue'
import NewJobs from '../components/partials/home/NewJobs.vue'
import MawthoqServices from '../components/partials/home/MawthoqSevices.vue'
import ServiceExplain from '../components/partials/home/ServiceExplain.vue'
import OrdersStages from '../components/partials/home/OrdersStages.vue'
import MawthoqPartners from '../components/partials/home/MawthoqPartners.vue'
import MawthoqApp from '../components/partials/home/MawthoqApp.vue'
import LayoutFooter from '../components/partials/LayoutFooter.vue'
export default {
    data(){
      return{
        base_url:base_url
      };
    },
    components :{
        Navbar , 
        HomeHeader , 
        SearchServiceSection , 
        HowItWork , 
        Features , 
        ServiceProduction , 
        NewJobs ,
        MawthoqServices , 
        ServiceExplain ,
        OrdersStages ,
        MawthoqPartners ,
        MawthoqApp ,
        LayoutFooter
        },
        mounted(){
            if( localStorage.getItem("token") === "" ){
                this.$router.push({ name: "Login" });
            }
        }
}
</script>