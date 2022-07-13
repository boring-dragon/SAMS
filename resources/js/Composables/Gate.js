export default function Gate() {

    function isAdmin() {
        return (usePage().props.value.user.role == 'admin') ? true : false;
    }

    function isTeacher() {
        return (usePage().props.value.user.role == 'teacher') ? true : false;
    }

    return { isAdmin, isTeacher };

}
