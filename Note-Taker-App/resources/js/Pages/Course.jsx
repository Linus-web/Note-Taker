import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Course({ course, notes }) {
    console.log(notes);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {course.name}
                </h2>
            }
        >
            <Head title={course.name} />

            <div className="bg-white dark:bg-gray-800 dark:text-white text-gray-700 p-6 shadow-sm rounded-lg">
                <p className=" mb-6">{course.description}</p>
            </div>

            <div className="mt-8">
                <h3 className="text-xl font-semibold mb-4 dark:text-white">
                    Course notes
                </h3>

                <div className="space-y-4">
                    {notes.length > 0 ? (
                        notes.map((note, index) => (
                            <div
                                key={index}
                                className="bg-gray-100 p-4 rounded-lg shadow-sm dark:bg-gray-800 dark:text-white flex justify-between"
                            >
                                <div className="flex flex-col">
                                    <p>{note.title}</p>
                                    <span className="text-sm text-gray-500">
                                        updated at:{" "}
                                        {new Date(
                                            note.created_at
                                        ).toLocaleString()}
                                    </span>
                                </div>
                                <div className="flex flex-col text-right">

                                    {note.user.name}
                                    <Link
                                    className="inline-block mt-4 text-indigo-600 hover:text-indigo-400"
                                        href={route("note.show", {
                                            id: note.id,
                                        })}
                                    >
                                        View Note
                                    </Link>
                                </div>
                            </div>
                        ))
                    ) : (
                        <p>No notes yet. Be the first to add one!</p>
                    )}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
