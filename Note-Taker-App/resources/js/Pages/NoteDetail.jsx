import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function NoteDetail({ note }) {

    console.log(note)

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {note.title}
                </h2>
            }
        >
            <Head title={`Note by ${note.title}`} />

            <div className="bg-white p-6 shadow-sm rounded-lg">
                <p className="text-gray-700 mb-6">{note.title}</p>
            </div>

            <div className="mt-8">
                <h4 className="text-xl font-semibold mb-4 dark:text-white">Note</h4>
                        <div
                            className="bg-gray-100 p-4 rounded-lg shadow-sm mb-4"
                        >
                            <p className="text-gray-600">{note.content}</p>
                        </div>
            </div>
        </AuthenticatedLayout>
    );
}
