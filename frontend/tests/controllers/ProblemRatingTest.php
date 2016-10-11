<?php

/**
 * Tests for api*Rating in ProblemController
 *
 * @author joemmanuel
 */
require_once 'libs/FileHandler.php';

class ProblemRatingTest extends OmegaupTestCase {
    /**
     * AddRating API caller helper. If a problem or user is not passed a new one is created.
     */
    private function addRating($rating = 5, $feature = 'Overall', $comment = 'some comment', $problem = null, $user = null) {
        // Get a problem
        $problem = is_null($problem) ? ProblemsFactory::createProblem() : $problem;
        $user = is_null($user) ? UserFactory::createUser() : $user;

        // Call API
        $requestArray = array();
        if ($rating != null) {
            $requestArray['rating'] = $rating;
        }

        if ($feature != null) {
            $requestArray['feature'] = $feature;
        }

        if ($comment != null) {
            $requestArray['comments'] = $comment;
        }

        $requestArray['auth_token'] = self::login($user);
        $requestArray['problem_alias'] = $problem['problem']->alias;

        $response = ProblemController::apiSetRating(new Request($requestArray));

        return array(
            'response' => $response,
            'user' => $user,
            'problem' => $problem,
            'rating' => $rating,
            'feature' => $feature,
            'comments' => $comment
        );
    }

    /**
     * Asserts the $result array returned from the addRating helper was created on the DB.
     */
    private function assertRatingCreated($result) {
        $featureRecord = UserFeedbackRatingDAO::search(array(
            'user_id' => $result['user']->user_id,
            'entity_id' => $result['problem']['problem']->problem_id,
            'entity_type' => 'Problem',
            'rating' => $result['rating'],
            'comments' => $result['comments']
        ));

        $this->assertEquals(1, count($featureRecord));
    }

    /**
     * Basic test for creating a problem
     */
    public function testAddValidRating() {
        $result = $this->addRating();
        $response = $result['response'];

        $this->assertEquals('ok', $response['status']);
        $this->assertRatingCreated($result);
    }

    /**
     * Test feature not existing
     *
     * @expectedException NotFoundException
     */
    public function testFeatureDoesNotExists() {
        $this->addRating(5 /*rating*/, 'NonExistentFeature' /*feature*/);
    }

    /**
     * Rating was created with optional comment
     */
    public function testCommentIsOptional() {
        $result = $this->addRating(5 /*rating*/, 'Overall' /*feature*/, null /*Comments*/);
        $this->assertRatingCreated($result);
    }

    /**
     * Rating > 5
     *
     * @expectedException InvalidParameterException
     */
    public function testRatingHigherThan5() {
        $this->addRating(6 /*rating*/);
    }

    /**
     * Rating < 1
     *
     * @expectedException InvalidParameterException
     */
    public function testRatingLessThan1() {
        $this->addRating(0 /*rating*/);
    }
}
