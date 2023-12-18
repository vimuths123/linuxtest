<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Issue;
use PHPUnit\TextUI\Output\Printer;

class IssueRepository implements IssueRepositoryInterface
{
    public function create(array $data)
    {
        return Issue::create($data);
    }
    
    public function all(int $perPage = 10)
    {
        // Fetch prescriptions with published_date not null
        $prescriptions = Issue::latest('updated_at')
            ->paginate($perPage);

        // Transform the result to a LengthAwarePaginator instance
        return new LengthAwarePaginator(
            $prescriptions->items(),
            $prescriptions->total(),
            $prescriptions->perPage(),
            $prescriptions->currentPage(),
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    }

    public function find($id)
    {
        return Issue::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $issue = Issue::findOrFail($id);
        $issue->update($data);

        return $issue;
    }
}