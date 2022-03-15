<template>
    <RightNavbar/>
    <TopNavbar/>
    <Users/>
</template>
<script>
import RightNavbar from '../../components/UserProfile/RightNavbar'
import TopNavbar from '../../components/UserProfile/TopNavbar'
import Users from '../../components/UserProfile/Users.vue'

export default {
    components : { RightNavbar , TopNavbar , Users} ,
    mounted(){
    }
}
</script>