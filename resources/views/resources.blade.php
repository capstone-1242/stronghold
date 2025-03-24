<x-layout>
    <div>
        {{ Breadcrumbs::render('resources') }}
    </div>

    <h2>Other Resources</h2>
    
    <x-disclaimer/>

    <section>
        <h3>Canada Help Lines</h3>
    
        <div>
            <p>If you're thinking about suicide, text 988</p>
        </div>
    
        <ul>
            <x-phone-resource name="Talk Suicide Canada" number="833-456-4566" />
            <x-phone-resource name="Alberta Mental Health Help Line" number="877-303-2642" />
            <x-phone-resource name="Alberta Addictions Help Line" number="866-332-2322" />
            <x-phone-resource name="Distress Line Edmonton" number="780-482-4357" />
            <x-phone-resource name="Distress Centre Calgary" number="403-266-4357" />
            <x-phone-resource name="Distress Line of South Alberta" number="403-327-7905" />
            <x-phone-resource name="First Nations Wellness Help Line" number="855-242-3310" />
            <x-phone-resource name="Kids Help Phone" number="1-800-668-6868" />
            <x-phone-resource name="Rural Distress Line" number="1-800-232-7288" />
        </ul>
    </section>

    <section>
        <h3>Community Resources</h3>

        <ul>
            <x-link-item title="Addiction" url="https://myhealth.alberta.ca/Alberta/Pages/Find-help-for-drug-or-gambling-problem.aspx" />
            <x-link-item title="Active Emergency Updates" url="https://www.alberta.ca/emergency" />
            <x-link-item title="Diversity & Inclusion" url="https://www.albertahealthservices.ca/about/Page13880.aspx" />
            <x-link-item title="Employment Assistance" url="https://www.alberta.ca/employment-supports" />
            <x-link-item title="Family Violence" url="https://www.alberta.ca/family-violence-find-supports" />
            <x-link-item title="Foodbanks Alberta" url="https://foodbanksalberta.ca/" />
            <x-link-item title="Indigenous Relations: Key Services" url="https://www.alberta.ca/indigenous-relations" />
            <x-link-item title="Suicide Prevention" url="https://www.albertahealthservices.ca/injprev/Page17711.aspx" />
            <x-link-item title="Stress Management" url="https://myhealth.alberta.ca/health/pages/conditions.aspx?hwid=rlxsk&#hw153409" />
            <x-link-item title="Sexual Assault Response Team" url="https://www.albertahealthservices.ca/info/Page16383.aspx" />
        </ul>
    </section>
        
</x-layout>