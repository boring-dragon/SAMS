import { usePage } from "@inertiajs/inertia-vue3";

export default function Gate() {

    function isAdmin() {
        return (usePage().props.value.auth.user.role == 'admin') ? true : false;
    }

    function isTeacher() {
        return (usePage().props.value.auth.user.role == 'teacher') ? true : false;
    }

    return { isAdmin, isTeacher };

}
