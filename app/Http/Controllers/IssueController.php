<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use App\Http\Requests\IssueStoreRequest;
use App\Http\Requests\IssueUpdateRequest;
use App\Repositories\IssueRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;

class IssueController extends Controller
{

    protected $issueRepository;
    protected $productRepository;

    public function __construct(IssueRepositoryInterface $issueRepository, ProductRepositoryInterface $productRepository)
    {
        $this->issueRepository = $issueRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $issues = $this->issueRepository->all($perPage);

        return view('issues.list', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perPage = 99999999;
        $products = $this->productRepository->all($perPage);
        return view('issues.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IssueStoreRequest $request)
    {
        $data = $request->validated();
        $issue = $this->issueRepository->create($data);

        return redirect()->route('issues.index')->with('success', 'Issue created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $issue = $this->issueRepository->find($id);

        return view('issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perPage = 99999999;
        $products = $this->productRepository->all($perPage);
        $issue = $this->issueRepository->find($id);
        return view('issues.edit', compact('issue', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IssueUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $blog = $this->issueRepository->update($id, $data);
        return redirect()->route('issues.index')->with('success', 'Issue updates successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
