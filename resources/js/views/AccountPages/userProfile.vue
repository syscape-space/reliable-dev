<template>

    <TopNavbar/>
    <UserProfile/>
    
    
</template>
<script>
import TopNavbar from '../../components/UserProfile/TopNavbar'
import UserProfile from '../../components/AccountSettings/UserProfile.vue'

export default {
    components : { TopNavbar , UserProfile  },
    mounted(){
         
    },
}
</script>