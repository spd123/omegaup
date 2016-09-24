<?php

/**
 * Tests for api*Rating in ProblemController
 *
 * @author joemmanuel
 */
require_once 'libs/FileHandler.php';

class ProblemRatingTest extends OmegaupTestCase {
    /**
     * Basic test for creating a problem
     */
    public function testAddValidRating() {
        // Get a problem
        $problem = ProblemsFactory::createProblem();
        $user = UserFactory::createUser();

        // Call API
        $rating = 5;
        $comment = 'omg osom';
        $response = ProblemController::apiSetRating(new Request(array(
            'auth_token' => self::login($user),
            'problem_alias' => $problem['problem']->alias,
            'feature' => 'Overall',
            'comments' => $comment,
            'rating' => $rating
        )));

        $this->assertEquals('ok', $response['status']);

        $featureRecord = UserFeedbackRatingDAO::search(array(
            'user_id' => $user->user_id,
            'entity_id' => $problem['problem']->problem_id,
            'entity_type' => 'Problem',
            'rating' => $rating,
            'comments' => $comment
        ));

        $this->assertEquals(1, count($featureRecord));
    }

    /**
     * Test feature not existing
     *
     * @expectedException NotFoundException
     */
    public function testFeatureDoesNotExists() {
         // Get a problem
        $problem = ProblemsFactory::createProblem();
        $user = UserFactory::createUser();

        // Call API
        $rating = 5;
        $comment = 'omg osom';
        $response = ProblemController::apiSetRating(new Request(array(
            'auth_token' => self::login($user),
            'problem_alias' => $problem['problem']->alias,
            'feature' => 'DoesNotExists',
            'comments' => $comment,
            'rating' => $rating
        )));
    }
}
