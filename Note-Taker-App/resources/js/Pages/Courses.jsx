import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";

export default function Courses({ courses }) {
    function displayCourses() {
        return courses.map((course, index) => (
            <Link
                key = {index}
                href={route("course", { id: course.id })}
                className="inline-block mt-4 text-indigo-600 hover:text-indigo-400"
            >
                <div
                    className="max-w-sm bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden m-4

                    hover:scale-105

                "
                >
                    <div className="relative h-48">
                        {/* Background image */}
                        <img
                            className="absolute inset-0 w-full h-full object-cover"
                            src={course.image_url} // Use your course image URL here
                            alt={course.name}
                        />
                        <div className="absolute inset-0 bg-gray-800 opacity-50"></div>
                    </div>

                    <div className="p-4">
                        {/* Course title */}
                        <h2 className="text-xl font-bold text-gray-900 dark:text-white">
                            {course.name}
                        </h2>

                        {/* Course description */}
                        <p className="text-gray-700 dark:text-gray-300 mt-2">
                            {course.description}
                        </p>
                    </div>
                </div>
            </Link>
        ));
    }

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Courses
                </h2>
            }
        >
            <Head title="Courses" />

            <div className="flex flex-wrap justify-center">
                {displayCourses()}
            </div>
        </AuthenticatedLayout>
    );
}
