import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Courses(courses) {

    function displayCourses(){
        return(
           courses[0].map((course , index) => (

            <p key={index}>{course.name}</p>
           ))
        );
    };



    return (
        <AuthenticatedLayout
        header={
            <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Courses
            </h2>
        }>


            <Head title="Courses" />

            {displayCourses()}



        </AuthenticatedLayout>
    );
}
