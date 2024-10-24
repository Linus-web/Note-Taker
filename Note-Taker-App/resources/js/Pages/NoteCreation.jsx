import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm} from '@inertiajs/react';
import { useEffect } from 'react';
export default function NoteCreation({ course }) {
    // Using the useForm hook to manage form data and submission
    const { data, setData, post, processing, reset } = useForm({
        title: '',
        content: '',
        course_id: course,  // Automatically set the course_id from the backend
    });


    // Handle form submission
    const handleSubmit = (e) => {
        e.preventDefault();
        // Post form data to the store route
        post(route('note.store'), {
            onSuccess: () => reset(),  // Reset form after successful post
        });
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Create a Note for {course.name}
                </h2>
            }
        >
            <Head title={`Create Note - ${course.name}`} />

            <div className="bg-white p-6 shadow-sm rounded-lg">
                <form onSubmit={handleSubmit}>
                    {/* Title Input */}
                    <div className="mb-4">
                        <label className="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" htmlFor="title">
                            Note Title
                        </label>
                        <input
                            id="title"
                            type="text"
                            value={data.title}
                            onChange={e => setData('title', e.target.value)}
                            required
                            className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        />
                    </div>

                    {/* Content Input */}
                    <div className="mb-6">
                        <label className="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" htmlFor="content">
                            Note Content
                        </label>
                        <textarea
                            id="content"
                            value={data.content}
                            onChange={e => setData('content', e.target.value)}
                            required
                            className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            rows="10"
                        ></textarea>
                    </div>

                    {/* Submit Button */}
                    <div className="flex items-center justify-between">
                        <button
                            type="submit"
                            disabled={processing}
                            className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >
                            {processing ? 'Saving...' : 'Save Note'}
                        </button>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>
    );
}
